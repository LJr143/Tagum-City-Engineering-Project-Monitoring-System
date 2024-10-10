<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProgramOfWorks extends Component
{
    use WithPagination;

    // Enable pagination

    public $projectId;

    public function mount($projectId)
    {
        $this->projectId = $projectId;
    }

    public function render()
    {
        // Fetch project details
        $project = Project::findOrFail($this->projectId);

        // Check if the user is an admin
        if (auth()->user()->isAdmin()) {
            // Fetch all cards related to the project if the user is an admin
            $cards = $project->pows()->paginate(9); // 9 cards per page
        } else {
            // Fetch only the cards assigned to the logged-in engineer
            $cards = $project->pows()->where('engineer_id', auth()->user()->id)->paginate(9); // 9 cards per page
        }

        return view('livewire.program-of-works', compact('cards'));
    }

}
