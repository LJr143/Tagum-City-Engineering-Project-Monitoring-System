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

        //  Create new Project 
        Project::create([
            'title' => $this->title,
            'address' => $this->address,
            'project_cost' => $this->project_cost,
            'description' => $this->description,
        ]);

        // Reset form input
        $this->reset();

        // Dispatch event
        $this->dispatch('project-added');

        // Redirect
        return redirect()->route('project-main')->with('success', 'Project added successfully.');
    }



}
