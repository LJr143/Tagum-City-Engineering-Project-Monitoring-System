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

        $cards = $project->pows()->paginate(9);

        return view('livewire.program-of-works', compact('cards'));
    }

}
