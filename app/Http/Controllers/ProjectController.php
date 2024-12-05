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
        $project = Project::with('pows')->find($id);
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

        // Ensure start_date is defined and compare it with today's date
        if ($project->pows && $project->start_date && $project->start_date <= $today) {
            if ($project->status !== 'ongoing') {
                $project->update(['status' => 'ongoing']);
            }
        } elseif ($project->pows && $project->pows->isNotEmpty() && $project->status != 'ongoing' ) {
            // Update status to 'for implementation' if pows exist
            $project->update(['status' => 'for implementation']);
        } else {
            // Default status update
            $project->update(['status' => 'approved project']);
        }


    }



}
