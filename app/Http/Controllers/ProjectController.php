<?php

namespace App\Http\Controllers;

use App\Imports\MaterialsImport;
use App\Models\Pow;
use App\Models\Project;
use App\Services\LogService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    public function viewPowInfo($id,  $index)
    {
        $pow = Pow::findOrFail($id);
        return view('layouts.Projects.material-cost-table', compact('pow', 'index'));
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        LogService::logAction(
            'deleted project',
            "Deleted project with id: {$id}",
            auth()->id()
        );

        return redirect()->route('project-main')->with('message', 'Project deleted successfully.');
    }

    public function destroyPow(Request $request, $id)
    {
        $pow = Pow::findOrFail($id);
        $project_id = $request->input('project_id');
        $pow->delete();
        LogService::logAction(
            'deleted POW',
            "Deleted POW with id: {$id}",
            auth()->id()
        );

        // Optionally, you can redirect or perform actions based on the project_id
        return redirect()->route('view-project-pow', ['id' => $project_id])
            ->with('message', 'Pow deleted successfully.');
    }

    public function suspend(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'project_id' => 'required|exists:projects,id',
        ]);

        // Find the project and update its status
        $project = Project::find($request->project_id);
        $project->status = 'suspended';
        $project->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Project has been suspended successfully.');
    }

    public function resume(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'project_id' => 'required|exists:projects,id',
        ]);

        // Find the project and update its status
        $project = Project::find($request->project_id);
        $project->status = 'pending'; // or any other status you prefer for resumed projects
        $project->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Project has been resumed successfully.');
    }




}
