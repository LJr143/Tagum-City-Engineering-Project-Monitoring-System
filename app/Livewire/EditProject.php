<?php

namespace App\Livewire;

use App\Models\User;
use App\Services\LogService;
use Livewire\Component;
use App\Models\Project;

class EditProject extends Component
{
    public $project;
    public $title;
    public $description;
    public $baranggay;
    public $street;
    public $x_axis;
    public $y_axis;
    public $start_date;
    public $end_date;
    public $status;
    public $projectIncharge_id;
    public $projectIncharge;

    public $search;

    protected $rules = [
        'title' => 'required|string|max:255',
        'baranggay' => 'required|string|max:255',
        'street' => 'required|string|max:255',
        'x_axis' => 'required|numeric|between:-180,180',
        'y_axis' => 'required|numeric|between:-90,90',
        'projectIncharge_id' => 'required|numeric|exists:users,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',// I added after:start_date
        'description' => 'required|string',
    ];
    protected $message = [
        'title.required' => 'The title is required.',
        'baranggay.required' => 'The baranggay is required.',
        'street.required' => 'The street is required.',
        'end_date.required' => 'The end date is required.',
        'end_date.after' => 'The end date must be after the start date.',
        'x_axis.required' => 'The X Axis is required.',
        'x_axis.numeric' => 'The X Axis must be a number.',
        'x_axis.between' => 'The X Axis must be between -180 and 180.',
        'y_axis.required' => 'The Y Axis is required.',
        'y_axis.numeric' => 'The Y Axis must be a number.',
        'y_axis.between' => 'The Y Axis must be between -90 and 90.',
        'projectIncharge_id.exists' => 'Please select a valid Project Incharge from the list.',
        'projectIncharge_id.required' => 'Project Incharge   required.',
    ];

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->title = $project->title;
        $this->description = $project->description;
        $this->baranggay = $project->baranggay;
        $this->street = $project->street;
        $this->x_axis = $project->x_axis;
        $this->y_axis = $project->y_axis;
        $this->start_date = $project->start_date;
        $this->end_date = $project->end_date;
        $this->status = $project->status;

        // Fetch the Project In-Charge using the relationship
        $this->projectIncharge = $project->projectIncharge; // Get the User object

        // Set the ID, if there is a Project In-Charge
        if ($this->projectIncharge) {
            $this->projectIncharge_id = $this->projectIncharge->id;
            $this->search = "{$this->projectIncharge->first_name} " .
                ($this->projectIncharge->middle_initial ? $this->projectIncharge->middle_initial . ' ' : '') .
                "{$this->projectIncharge->last_name}";
        } else {
            $this->projectIncharge_id = null; // No in-charge assigned
            $this->search = ''; // Clear the search if no in-charge
        }

        // Optionally load all project in-charges if needed for your dropdown
        $this->projectIncharge = User::where('role', 'project incharge')->get();
    }




    public function updateProject()
    {
        $this->validate();

        $this->project->update([
            'title' => $this->title,
            'description' => $this->description,
            'baranggay' => $this->baranggay,
            'street' => $this->street,
            'x_axis' => $this->x_axis,
            'y_axis' => $this->y_axis,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
            'project_incharge_id' => $this->projectIncharge_id,
        ]);

        LogService::logAction(
            'edited project',
            "Edited Project with title: {$this->title}",
            auth()->id()
        );

        $this->dispatch('project-edited');

        return redirect()->route('view-project-pow', ['id' => $this->project])->with('success', 'Project Updated successfully.');

    }

    public function render()
    {
        return view('livewire.edit-project');
    }
}

