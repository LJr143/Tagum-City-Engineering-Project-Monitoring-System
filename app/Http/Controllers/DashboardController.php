<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Ensure you import the Auth facade

class DashboardController extends Controller
{
    // Helper function to format large numbers into short form
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

    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Load only associated projects for the project in-charge
        $projects = Project::with(['pows', 'pows.indirectCosts'])
            ->when($user->isProjectIncharge(), function ($query) use ($user) {
                return $query->where('project_incharge_id', $user->id);
            })
            ->paginate(10);

        // Calculate the total costs for each project and apply formatting.
        foreach ($projects as $project) {
            $project->materialSpentCost = $project->pows->flatMap(function ($pow)  {
                return $pow->materials;
            })->sum('spent_cost');

            $project->laborSpentCost = $project->pows->flatMap(function ($pow)  {
                return $pow->payroll;
            })->sum('payroll_amount');

            $project->indirectSpentCost =$project->pows->flatMap(function ($pow)  {
                return $pow->indirectCosts;
            })->sum('spent_cost');


            $project->total_material_cost = $project->pows->sum('total_material_cost');
            $project->total_labor_cost = $project->pows->sum('total_labor_cost');
            $project->total_indirect_costs = $project->pows->flatMap(function ($pow) {
                    return $pow->indirectCosts;
                })->sum('amount');


            $totalSpentCost = $project->materialSpentCost + $project->laborSpentCost + $project->indirectSpentCost;
            $totalProjectCost = $project->total_material_cost + $project->total_labor_cost + $project->total_indirect_costs;

            $project->overallProgress = $totalProjectCost > 0
                ? ($totalSpentCost / $totalProjectCost) * 100
                : 0;


            $project->total_material_cost = $this->formatNumberShort($project->pows->sum('total_material_cost'));
            $project->total_labor_cost = $this->formatNumberShort($project->pows->sum('total_labor_cost'));
            $project->total_indirect_costs = $this->formatNumberShort(
                $project->pows->flatMap(function ($pow) {
                    return $pow->indirectCosts;
                })->sum('amount')
            );

        }



        $totalUsers = User::count();

        $totalProjects = Project::when($user->isProjectIncharge(), function ($query) use ($user) {
            return $query->where('project_incharge_id', $user->id);
        })->count();

        $pendingProjects = Project::when($user->isProjectIncharge(), function ($query) use ($user) {
            return $query->where('project_incharge_id', $user->id);
        })->where('status', 'pending')->count();

        $completedProjects = Project::when($user->isProjectIncharge(), function ($query) use ($user) {
            return $query->where('project_incharge_id', $user->id);
        })->where('status', 'completed')->count();

        $suspendedProjects = Project::when($user->isProjectIncharge(), function ($query) use ($user) {
            return $query->where('project_incharge_id', $user->id);
        })->where('status', 'suspended')->count();

        return view('layouts.dashboard', compact(
            'user',
            'totalUsers',
            'totalProjects',
            'projects',
            'pendingProjects',
            'completedProjects',
            'suspendedProjects'
        ));
    }

    public function calculateOverallProgress(): void
    {
        $totalSpentCost = $this->materialSpentCost + $this->laborSpentCost + $this->indirectSpentCost + $this->directSpentCost;
        $totalProjectCost = $this->totalMaterialCost + $this->totalLaborCost + $this->totalIndirectCost + $this->totalDirectCost;

        $this->overallProgress = $totalProjectCost > 0
            ? ($totalSpentCost / $totalProjectCost) * 100
            : 0;
    }
}
