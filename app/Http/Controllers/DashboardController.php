<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Retrieve the required data
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

        // Retrieve and process the projects with pagination
        $projects = Project::with(['pows', 'pows.indirectCosts'])
            ->when($user->isProjectIncharge(), function ($query) use ($user) {
                return $query->where('project_incharge_id', $user->id);
            })
            ->paginate(10);

        // Format number as short form (K, M, B)
        $this->formatNumberShort = function ($number, $precision = 1) {
            if ($number >= 1000000000) {
                return round($number / 1000000000, $precision) . 'B';
            } elseif ($number >= 1000000) {
                return round($number / 1000000, $precision) . 'M';
            } elseif ($number >= 1000) {
                return round($number / 1000, $precision) . 'K';
            }
            return $number;
        };

        // Process each project
//        foreach ($projects as $project) {
//            $project->materialSpentCost = $project->pows->flatMap(function ($pow) {
//                return $pow->materials;
//            })->sum('spent_cost');
//
//            $project->laborSpentCost = $project->pows->flatMap(function ($pow) {
//                return $pow->payroll;
//            })->sum('payroll_amount');
//
//            $project->indirectSpentCost = $project->pows->flatMap(function ($pow) {
//                return $pow->indirectCosts;
//            })->sum('spent_cost');
//
//            $project->total_material_cost = $this->formatNumberShort($project->pows->sum('total_material_cost'));
//            $project->total_labor_cost = $this->formatNumberShort($project->pows->sum('total_labor_cost'));
//            $project->total_indirect_costs = $this->formatNumberShort($project->pows->flatMap(function ($pow) {
//                return $pow->indirectCosts;
//            })->sum('amount'));
//
//            $totalSpentCost = $project->materialSpentCost + $project->laborSpentCost + $project->indirectSpentCost;
//            $totalProjectCost = 1; // Change this logic as needed
//            $project->overallProgress = $totalProjectCost > 0 ? ($totalSpentCost / $totalProjectCost) * 100 : 0;
//        }

        // Pass the data to the view
        return view('layouts.dashboard', [
            'projects' => $projects,
            'totalUsers' => $totalUsers,
            'totalProjects' => $totalProjects,
            'pendingProjects' => $pendingProjects,
            'completedProjects' => $completedProjects,
            'suspendedProjects' => $suspendedProjects,
        ]);
    }
}
