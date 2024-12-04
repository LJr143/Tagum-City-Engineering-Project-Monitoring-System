<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\User;
use App\Notifications\ProjectNotification;
use App\Services\LogService;
use Livewire\Component;

class AddProject extends Component
{
    public $title;
    public $baranggay;
    public $street;
    public $start_date;
    public $end_date;
    public $x_axis;
    public $y_axis;
    public $projectIncharge_id;
    public $description;
    public $projectIncharge;

    // Validation rules
    protected $rules = [
        'title' => 'required|string|max:255',
        'baranggay' => 'required|string|max:255',
        'street' => 'string|max:255',
        'x_axis' => 'nullable|numeric|between:-180,180', // Assuming these are longitude values
        'y_axis' => 'nullable|numeric|between:-90,90',   // Assuming these are latitude values
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after:start_date',
        'description' => 'nullable|string',
        'projectIncharge_id' => 'nullable|numeric|exists:users,id',
    ];

    protected $messages = [
        'end_date.after' => 'The end date must be after the start date.',
        'x_axis.numeric' => 'The X Axis must be a number.',
        'x_axis.between' => 'The X Axis must be between -180 and 180.',
        'y_axis.numeric' => 'The Y Axis must be a number.',
        'y_axis.between' => 'The Y Axis must be between -90 and 90.',
        'projectIncharge_id.exists' => 'Please select a valid Project Incharge from the list.',
    ];

    public function mount(): void
    {
        $this->projectIncharge = User::where('role', 'project incharge')->get();
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $validatedData['start_date'] = $this->start_date ?: null;
        $validatedData['end_date'] = $this->end_date ?: null;


        // If validation passes, create the project
        $project = Project::create([
            'title' => $this->title,
            'baranggay' => $this->baranggay,
            'street' => $this->street,
            'x_axis' => $this->x_axis,
            'y_axis' => $this->y_axis,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => 'approved project',
            'project_incharge_id' => $this->projectIncharge_id,
            'description' => $this->description,
        ]);

        $projectId = $project->id;

        $userToNotify = User::where(function ($query) {
            $query->whereIn('role', ['admin', 'encoder']);
        })->get();

        foreach ($userToNotify as $user) {
            $user->notify(new ProjectNotification('A new project has been created.', $projectId));
        }

        LogService::logAction(
            'added project',
            "Added Project with title: {$this->title}",
            auth()->id()
        );

        $this->reset();

        $this->dispatch('project-added');

    }
}
