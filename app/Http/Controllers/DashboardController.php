<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function redirectToProjects($status)
    {
        return redirect()->route('project-main', ['status' => $status]);
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

        // Prepare chart data as an array of objects
        $chartData = $projects->map(function ($project) {
            $materialSpentCost = $project->pows->flatMap(function ($pow) {
                return $pow->materials;
            })->sum('spent_cost');

            $laborSpentCost = $project->pows->flatMap(function ($pow) {
                return $pow->payroll;
            })->sum('payroll_amount');

            $indirectSpentCost = $project->pows->flatMap(function ($pow) {
                return $pow->indirectCosts;
            })->sum('spent_cost');

            $totalMaterialCost = $project->pows->sum('total_material_cost');
            $totalLaborCost = $project->pows->sum('total_labor_cost');
            $totalIndirectCosts = $project->pows->flatMap(function ($pow) {
                return $pow->indirectCosts;
            })->sum('amount');

            $totalSpentCost = $materialSpentCost + $laborSpentCost + $indirectSpentCost;
            $totalProjectCost = $totalMaterialCost + $totalLaborCost + $totalIndirectCosts;

            $overallProgress = $totalProjectCost > 0 ? ($totalSpentCost / $totalProjectCost) * 100 : 0;
            $materialUsagePercentage = $totalMaterialCost > 0 ? ($materialSpentCost / $totalMaterialCost) * 100 : 0;
            $laborUsagePercentage = $totalLaborCost > 0 ? ($laborSpentCost / $totalLaborCost) * 100 : 0;

            return [
                'title' => $project->title,
                'overall_progress_percentage' => $overallProgress,
                'material_usage_percentage' => $materialUsagePercentage,
                'labor_usage_percentage' => $laborUsagePercentage,
            ];
        });

        $totalUsers = User::count();
        $totalProjects = Project::when($user->isProjectIncharge(), function ($query) use ($user) {
            return $query->where('project_incharge_id', $user->id);
        })->count();
        $pendingProjects = Project::when($user->isProjectIncharge(), function ($query) use ($user) {
            return $query->where('project_incharge_id', $user->id);
        })->where('status', 'ongoing')->count();
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
            'suspendedProjects',
            'chartData' // Pass the chart data to the view
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
