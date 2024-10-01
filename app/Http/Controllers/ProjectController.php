<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
 public function index(){
      $projects = Project::all();
      $pendingProjects = Project::where('status', 'pending')->count();
      $completedProjects = Project::where('status', 'completed')->count();

      return view('layouts.projects.project-main', compact('projects', 'pendingProjects', 'completedProjects'));
 }

}
