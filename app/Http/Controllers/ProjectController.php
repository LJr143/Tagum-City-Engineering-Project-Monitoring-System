<?php

namespace App\Http\Controllers;

use App\Imports\MaterialsImport;
use App\Models\DirectCost;
use App\Models\Pow;
use App\Models\PowSuspendResume;
use App\Models\Project;
use App\Models\SystemConfiguration;
use App\Notifications\ProjectNotification;
use App\Services\LogService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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
        $this->updateProjectStatus($project);


        return view('layouts.projects.viewproject1', compact('project'));
    }

    public function viewPowInfo($id,  $index)
    {
        $pow = Pow::findOrFail($id);
        $contingencyBalance = $pow?->directCosts()->where('description', 'contingencies')->value('remaining_cost');
        return view('layouts.Projects.material-cost-table', compact('pow', 'index', 'contingencyBalance'));
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

        return redirect()->route('view-project-pow', ['id' => $project_id])
            ->with('message', 'Pow deleted successfully.');
    }


    protected function updateProjectStatus(Project $project)
    {
        $today = Carbon::today();

        // Update the project status if the start_date has passed or is today
        if ($project->start_date && $project->start_date <= $today && $project->status !== 'ongoing') {
            $project->update(['status' => 'ongoing']);
        }else if (!$project->pows->isEmpty()) {
            $project->update(['status' => 'for implementation']);
        }else{
            $project->update(['status' => 'approved project']);
        }
    }



}
