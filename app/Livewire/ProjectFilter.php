<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectFilter extends Component
{
    use WithPagination;

    public $selectedStatus = 'all';
    public $searchTerm = '';
    public $startDate;
    public $endDate;

    public $totalProjects;
    public $pendingProjects;
    public $completedProjects;
    public $suspendedProjects;

    public $totalMaterialCostTable = 0;

    protected $paginationTheme = 'tailwind';

    public function mount()
    {
        $this->loadProjectCounts();
    }

    private function loadProjectCounts()
    {
        $user = auth()->user();

        if ($user->isProjectInCharge()) {
            // Only count projects assigned to the project in-charge
            $this->totalProjects = Project::where('project_incharge_id', $user->id)->count();
            $this->pendingProjects = Project::where('project_incharge_id', $user->id)->where('status', 'pending')->count();
            $this->completedProjects = Project::where('project_incharge_id', $user->id)->where('status', 'completed')->count();
            $this->suspendedProjects = Project::where('project_incharge_id', $user->id)->where('status', 'suspended')->count();
        } else {
            // Count all projects for admin or other roles
            $this->totalProjects = Project::count();
            $this->pendingProjects = Project::where('status', 'pending')->count();
            $this->completedProjects = Project::where('status', 'completed')->count();
            $this->suspendedProjects = Project::where('status', 'suspended')->count();
        }
    }


        public function filterProjects()
        {
            $query = Project::with('pows.indirectCosts', 'pows.materials', 'pows.payroll');

            $user = auth()->user();

            if ($user && $user->isProjectIncharge()) {
                $query->where('project_incharge_id', $user->id);
            }


            if ($this->selectedStatus !== 'all') {
                $query->where('status', $this->selectedStatus);
            }

            if ($this->startDate) {
                $query->whereDate('start_date', '>=', $this->startDate);
            }

            if ($this->endDate) {
                $query->whereDate('end_date', '<=', $this->endDate);
            }

            if ($this->searchTerm) {
                $query->where('title', 'like', '%' . $this->searchTerm . '%');
            }

            $projects = $query->paginate(10);

            foreach ($projects as $project) {
            $totalMaterialCost = $project->pows->sum('total_material_cost');
            $totalLaborCost = $project->pows->sum('total_labor_cost');
            $totalIndirectCost = $project->pows->flatMap(function ($pow) {
                return $pow->indirectCosts;
            })->sum('amount');

            $materialSpentCost = $project->pows->flatMap(function ($pow) {
                return $pow->materials;
            })->sum('spent_cost');

            $laborSpentCost = $project->pows->flatMap(function ($pow) {
                return $pow->payroll;
            })->sum('payroll_amount');

            $project->total_project_cost = $totalMaterialCost + $totalLaborCost + $totalIndirectCost;

            $totalSpentCost = $materialSpentCost + $laborSpentCost + $totalIndirectCost; // Add indirect costs if applicable

            $project->overall_progress_percentage = $project->total_project_cost > 0
                ? ($totalSpentCost / $project->total_project_cost) * 100
                : 0;

            $project->material_usage_percentage = $totalMaterialCost > 0
                ? ($materialSpentCost / $totalMaterialCost) * 100
                : 0;

            $project->labor_usage_percentage = $totalLaborCost > 0
                ? ($laborSpentCost / $totalLaborCost) * 100
                : 0;

            $project->formatted_total_project_cost = $this->formatCost($project->total_project_cost);
            $project->formatted_total_material_cost = $this->formatCost($totalMaterialCost);
            $project->formatted_total_labor_cost = $this->formatCost($totalLaborCost);
        }

        return $projects;
    }

    public function formatCost($number)
    {
        if ($number >= 1000000000) {
            return number_format($number / 1000000000, 2) . 'B';
        } elseif ($number >= 1000000) {
            return number_format($number / 1000000, 2) . 'M';
        } elseif ($number >= 1000) {
            return number_format($number / 1000, 2) . 'K';
        } else {
            return number_format($number);
        }
    }

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    public function searchProjects($term)
    {
        $this->searchTerm = $term;
        $this->resetPage();
    }

    public function render()
    {
        $projects = $this->filterProjects();
        return view('livewire.project-filter', compact('projects'));
    }
}
