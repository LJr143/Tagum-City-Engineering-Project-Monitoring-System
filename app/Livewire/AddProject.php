<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class AddProject extends Component
{

    public $title;
    public $address;
    public $project_cost;
    public $description;

    protected $rules = [
        'title' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'project_cost' => 'required|numeric',
        'description' => 'required|string',
    ];

    public function submit()
    {
        $this->validate();

        // Create a new project using Eloquent Builder
        Project::create([
            'title' => $this->title,
            'address' => $this->address,
            'project_cost' => $this->project_cost,
            'description' => $this->description,
        ]);

        // Reset the form fields
        $this->reset();

        // Dispatch the event (optional if you want to use notifications)
        $this->dispatch('project-added');

        // Redirect with success message
        return redirect()->route('project-main')->with('success', 'Project added successfully.');
    }



}
