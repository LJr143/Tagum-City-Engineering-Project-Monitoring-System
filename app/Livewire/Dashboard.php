<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public $totalUsers;
    public $totalProjects;
    public $pendingProjects;
    public $completedProjects;
    public $suspendedProjects;

    // Format numbers into a short form (K, M, B)
    private function formatNumberShort($number, $precision = 1)
    {
        if ($number >= 1000000000) {
            return round($number / 1000000000, $precision) . 'B';
        } elseif ($number >= 1000000) {
            return round($number / 1000000, $precision) . 'M';
        } elseif ($number >= 1000) {
            return round($number / 1000, $precision) . 'K';
        }
        return $number;
    }

    public function mount()
    {
        $user = Auth::user();

        $this->totalUsers = User::count();
        $this->totalProjects = Project::when($user->isProjectIncharge(), function ($query) use ($user) {
            return $query->where('project_incharge_id', $user->id);
        })->count();

        $this->pendingProjects = Project::when($user->isProjectIncharge(), function ($query) use ($user) {
            return $query->where('project_incharge_id', $user->id);
        })->where('status', 'ongoing')->count();

        $this->completedProjects = Project::when($user->isProjectIncharge(), function ($query) use ($user) {
            return $query->where('project_incharge_id', $user->id);
        })->where('status', 'completed')->count();

        $this->suspendedProjects = Project::when($user->isProjectIncharge(), function ($query) use ($user) {
            return $query->where('project_incharge_id', $user->id);
        })->where('status', 'suspended')->count();
    }

    public function redirectToProjects($status)
    {
        return redirect()->route('project-main', ['status' => $status]);
    }

    public function render()
    {
        $user = Auth::user();
        $projects = Project::with(['pows', 'pows.indirectCosts'])
            ->when($user->isProjectIncharge(), function ($query) use ($user) {
                return $query->where('project_incharge_id', $user->id);
            })
            ->paginate(10);

        foreach ($projects as $project) {
            $project->materialSpentCost = $project->pows->flatMap(function ($pow) {
                return $pow->materials;
            })->sum('spent_cost');

            $project->laborSpentCost = $project->pows->flatMap(function ($pow) {
                return $pow->payroll;
            })->sum('payroll_amount');

            $project->indirectSpentCost = $project->pows->flatMap(function ($pow) {
                return $pow->indirectCosts;
            })->sum('spent_cost');

            $project->total_material_cost = $this->formatNumberShort($project->pows->sum('total_material_cost'));
            $project->total_labor_cost = $this->formatNumberShort($project->pows->sum('total_labor_cost'));
            $project->total_indirect_costs = $this->formatNumberShort($project->pows->flatMap(function ($pow) {
                return $pow->indirectCosts;
            })->sum('amount'));

            $totalSpentCost = $project->materialSpentCost + $project->laborSpentCost + $project->indirectSpentCost;
            $totalProjectCost = $project->total_material_cost + $project->total_labor_cost + $project->total_indirect_costs;
            $project->overallProgress = $totalProjectCost > 0 ? ($totalSpentCost / $totalProjectCost) * 100 : 0;
        }



        return view('livewire.dashboard', [
            'projects' => $projects,
        ]);
    }
}
