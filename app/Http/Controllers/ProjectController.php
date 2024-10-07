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


    public function view($id)
    {
        $project = Project::findOrFail($id);
        return view('layouts.projects.viewproject1', compact('project'));
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('project-main')->with('message', 'Project deleted successfully.');
    }

}
