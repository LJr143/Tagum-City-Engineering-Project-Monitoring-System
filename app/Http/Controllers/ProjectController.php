<?php

namespace App\Http\Controllers;

use App\Imports\MaterialsImport;
use App\Models\DirectCost;
use App\Models\Pow;
use App\Models\PowSuspendResume;
use App\Models\Project;
use App\Models\SystemConfiguration;
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
        $contingencyBalance = $pow
            ? $pow->directCosts()->where('description', 'contingencies')->value('remaining_cost')
            : null;
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

    public function suspend(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'pow_id' => 'required|exists:program_of_works,id',
        ]);

        // Find the project and update its status
        $powId = $request->pow_id;
        $project = Project::find($request->project_id);
        $project->status = 'suspended';
        $project->save();

        // Store the suspension record in PowSuspendResume
        PowSuspendResume::create([
            'pow_id' => $powId,
            'transaction' => 'suspended',
            'user_id' => Auth::id(),
            'created_at' => now(),
        ]);


        return redirect()->back();
    }

    public function resume(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'pow_id' => 'required|exists:program_of_works,id',
        ]);

        // Find the project and update its status
        $powId = $request->pow_id;
        $project = Project::find($request->project_id);
        $project->status = 'pending'; // or any other status you prefer for resumed projects
        $project->save();

        PowSuspendResume::create([
            'pow_id' => $powId,
            'transaction' => 'resume', // or specific transaction type if needed
            'user_id' => Auth::id(), // get the ID of the authenticated user
            'created_at' => now(), // if you want to set the current timestamp manually
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Project has been resumed successfully.');
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




}
