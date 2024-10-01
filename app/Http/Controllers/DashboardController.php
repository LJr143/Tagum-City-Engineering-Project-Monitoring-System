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
        $totalProjects = Project::count(); // Get the total number of projects
        $projects = Project::all();
        $pendingProjects = Project::where('status', 'pending')->count();
        $completedProjects = Project::where('status', 'completed')->count();

        return view('layouts.dashboard', compact('user', 'totalUsers', 'totalProjects', 'projects', 'pendingProjects', 'completedProjects'));
    }
}
