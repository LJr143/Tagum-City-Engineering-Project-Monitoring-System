<?php

namespace App\Livewire;

use App\Models\Project;
use App\Notifications\ProjectNotification;
use Livewire\Component;

class ManageApprovalDenial extends Component
{
    public $project;

    public function mount($project)
    {
        $this->project=$project;
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
        $this->dispatch('marked-complete-approve');

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
        $this->dispatch('marked-complete-deny');

    }

    public function render()
    {
        return view('livewire.manage-approval-denial');
    }
}
