<?php

namespace App\Livewire;

use App\Models\User;
use App\Notifications\ProjectNotification;
use Livewire\Component;
use App\Models\Pow;
use App\Models\Project;

class MarkProjectComplete extends Component
{
    public $pow_id;

    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
    }

    public function markComplete(): void
    {
        // Validate the data
        $this->validate([
            'pow_id' => 'required|exists:program_of_works,id',
        ]);

        // Get the Pow and Project
        $pow = Pow::find($this->pow_id);

        if ($pow) {
            $project = $pow->project;

            // Ensure the project is valid and update the status
            if ($project) {
                $project->status = 'pending validation';
                $project->save();

                // Notify the admin
                // Fetch all admins
                $admins = User::where('role', 'admin')->get();

                // Notify each admin
                foreach ($admins as $admin) {
                    $admin->notify(new ProjectNotification(
                        'A project has been marked completed and requires your attention.',
                        $project->id
                    ));
                }

                $user = auth()->user();
                $user->notify(new ProjectNotification(
                    'Project marked complete and is waiting for validation.',
                    $project->id
                ));

                $this->dispatch('mark-complete');
                // Optionally, trigger a success message
                session()->flash('message', 'Project marked as pending validation.');
            }
        }
    }




    public function render()
    {
        return view('livewire.mark-project-complete');
    }
}
