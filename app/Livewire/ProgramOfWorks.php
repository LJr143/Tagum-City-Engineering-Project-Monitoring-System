<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProgramOfWorks extends Component
{
    use WithPagination; // Enable pagination

    public $projectId;

    public function mount($projectId)
    {
        $this->projectId = $projectId;
    }

    public function render()
    {
        // Fetch cards related to the project with pagination
        $cards = Project::find($this->projectId)->pows()->paginate(10); // 10 cards per page

        return view('livewire.program-of-works', compact('cards'));
    }
}
