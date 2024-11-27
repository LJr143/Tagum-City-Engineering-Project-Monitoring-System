<?php

namespace App\Livewire;

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

    public function markComplete()
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
