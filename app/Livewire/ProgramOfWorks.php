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
        // Fetch project details and associated pows with pagination
        $project = Project::findOrFail($this->projectId);

        // Fetch cards related to the project with pagination
        $cards = $project->pows()->paginate(9); // 9 cards per page

        return view('livewire.program-of-works', compact('cards'));
    }
}
