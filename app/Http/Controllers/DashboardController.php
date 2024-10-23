<?php

namespace App\Http\Controllers;


use App\Models\Project;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::first();
        $totalUsers = User::count();
        $totalProjects = Project::count();
        $projects = Project::paginate(10);
        $pendingProjects = Project::where('status', 'pending')->count();
        $completedProjects = Project::where('status', 'completed')->count();
        $suspendedProjects = Project::where('status', 'suspended')->count();

        return view('layouts.dashboard', compact('user', 'totalUsers', 'totalProjects', 'projects', 'pendingProjects', 'completedProjects', 'suspendedProjects'));
    }
}
