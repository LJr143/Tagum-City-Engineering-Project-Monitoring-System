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
                return $query->where('project_incharge_id', $user->id); // Filter by in-charge ID
            })
            ->paginate(10);

        // Calculate the total costs for each project and apply formatting.
        foreach ($projects as $project) {
            $project->total_material_cost = $this->formatNumberShort($project->pows->sum('total_material_cost'));
            $project->total_labor_cost = $this->formatNumberShort($project->pows->sum('total_labor_cost'));
            $project->total_indirect_costs = $this->formatNumberShort(
                $project->pows->flatMap(function ($pow) {
                    return $pow->indirectCosts; // Flatten the indirect costs
                })->sum('amount')
            );
        }

        // Additional stats for the dashboard
        $totalUsers = User::count();

        // Calculate project statistics based on the in-charge ID
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
}
