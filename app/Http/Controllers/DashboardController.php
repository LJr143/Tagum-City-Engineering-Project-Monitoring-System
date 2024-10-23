<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Load related pows to avoid N+1 query issue.
        $projects = Project::with('pows')->paginate(10);

        // Calculate the total material cost for each project.
        foreach ($projects as $project) {
            $project->total_material_cost = $project->pows->sum('total_material_cost');
        }

        // Additional stats for the dashboard.
        $user = User::first();
        $totalUsers = User::count();
        $totalProjects = Project::count();
        $pendingProjects = Project::where('status', 'pending')->count();
        $completedProjects = Project::where('status', 'completed')->count();
        $suspendedProjects = Project::where('status', 'suspended')->count();

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
