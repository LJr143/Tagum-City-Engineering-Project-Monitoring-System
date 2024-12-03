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


    public function realignFunds(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'realign_amount' => 'required|numeric|min:0',
            'destination' => 'required|in:material,labor',
        ]);

        $project = Project::findOrFail($request->project_id);
        $pow = $project->pows()->first();

        if ($pow) {
            $realignAmount = $request->realign_amount;

            $directCost = $pow->inDirectCosts()->where('description', 'contingencies')->first();

            if ($directCost) {
                if ($directCost->remaining_cost >= $realignAmount) {
                    if ($request->destination == 'material') {
                        $pow->total_material_cost += $realignAmount;
                    } else {
                        $pow->total_labor_cost += $realignAmount;
                    }

                    $directCost->remaining_cost -= $realignAmount;
                    $directCost->save();

                    $pow->save();

                    return redirect()->back()->with('status', 'Contingency fund realigned successfully!');
                } else {
                    return redirect()->back()->withErrors('Insufficient contingency funds for realignment.');
                }
            } else {
                return redirect()->back()->withErrors('Contingency cost not found.');
            }
        }

        return redirect()->back()->withErrors('POW not found for the specified project.');
    }

    public function approveProject($projectId)
    {
        $project = Project::findOrFail($projectId);

        $project->projectIncharge->notify(new ProjectNotification(
            'Your project has been approved. Please review.',
            $project->id
        ));

        // Change status to "Complete"
        $project->status = 'completed';
        $project->save();

        session()->flash('success', 'Project has been approved and marked as complete.');
    }

    public function denyProject($projectId)
    {
        $project = Project::findOrFail($projectId);

        // Notify the project in-charge
        $project->projectIncharge->notify(new ProjectNotification(
            'Your project has been denied. Please review and resubmit.',
            $project->id
        ));

        // Change status to "Ongoing"
        $project->status = 'ongoing';
        $project->save();

        session()->flash('error', 'Project has been denied and status set to ongoing.');
    }





}
