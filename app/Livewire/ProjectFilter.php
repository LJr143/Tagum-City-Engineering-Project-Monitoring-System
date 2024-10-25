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

    protected $paginationTheme = 'tailwind';

    public function mount()
    {
        $this->loadProjectCounts();
    }

    private function loadProjectCounts()
    {
        $this->totalProjects = Project::count();
        $this->pendingProjects = Project::where('status', 'pending')->count();
        $this->completedProjects = Project::where('status', 'completed')->count();
        $this->suspendedProjects = Project::where('status', 'suspended')->count();
    }

    public function filterProjects()
    {
        $query = Project::with('pows.indirectCosts');

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
            $project->total_material_cost = $project->pows->sum('total_material_cost');
            $project->total_labor_cost = $project->pows->sum('total_labor_cost');
            $project->total_indirect_cost = $project->pows->flatMap(function ($pow) {
                return $pow->indirectCosts;
            })->sum('amount');

            $project->total_project_cost = $project->total_material_cost + $project->total_labor_cost + $project->total_indirect_cost;

            // Format costs using formatCost method
            $project->formatted_total_project_cost = $this->formatCost($project->total_project_cost);
            $project->formatted_total_material_cost = $this->formatCost($project->total_material_cost);
            $project->formatted_total_labor_cost = $this->formatCost($project->total_labor_cost);
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

//updated area
