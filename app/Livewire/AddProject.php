<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\User;
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

    protected $rules = [
        'title' => 'required|string|max:255',
        'baranggay' => 'required|string|max:255',
        'street' => 'required|string|max:255',
        'x_axis' => 'required|string|max:255',
        'y_axis' => 'required|string|max:255',
        'projectIncharge_id' => 'required|numeric',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'description' => 'required|string',
    ];

    public function mount(): void
    {
        $this->projectIncharge = User::where('role', 'project incharge')->get();
    }

    public function submit()
    {
        try {
            $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors()); // Check if validation fails
        }

        Project::create([
            'title' => $this->title,
            'baranggay' => $this->baranggay,
            'street' => $this->street,
            'x_axis' => $this->x_axis,
            'y_axis' => $this->y_axis,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'project_incharge_id' => $this->projectIncharge_id,
            'description' => $this->description,
        ]);

        LogService::logAction(
            'added project',
            "Added Project with title: {$this->title}",
            auth()->id()
        );

        // Reset form input
        $this->reset();

        // Dispatch event
        $this->dispatch('project-added');

        // Redirect
        return redirect()->route('project-main')->with('success', 'Project added successfully.');
    }


}
