<?php


use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectManager extends Livewire\Component
{
    public $projectId;

    public function deleteProject()
    {
        // Example of project deletion logic
        Project::find($this->projectId)->delete();

        // Add a flash message or trigger an action
        session()->flash('message', 'Project deleted successfully.');

        // Optionally close the modal in the frontend
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        return view('livewire.project-manager');
    }
}
