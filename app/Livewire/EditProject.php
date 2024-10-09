<?php

namespace App\Livewire;

use App\Services\LogService;
use Livewire\Component;
use App\Models\Project;

class EditProject extends Component
{
    public $project;
    public $title;
    public $description;
    public $address;
    public $project_cost;
    public $status;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'address' => 'required|string|max:255',
        'project_cost' => 'required|numeric',
        'status' => 'required|string|max:255',
    ];

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->title = $project->title;
        $this->description = $project->description;
        $this->address = $project->address;
        $this->project_cost = $project->project_cost;
        $this->status = $project->status;
    }

    public function updateProject()
    {
        $this->validate();

        $this->project->update([
            'title' => $this->title,
            'description' => $this->description,
            'address' => $this->address,
            'project_cost' => $this->project_cost,
            'status' => $this->status,
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

