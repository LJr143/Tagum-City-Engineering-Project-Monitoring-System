<?php

namespace App\Livewire;

use App\Models\IndirectCost;
use App\Models\Pow;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProgramOfWorks extends Component
{
    use WithPagination;

    public $pow;
    public $projectId;
    public $totalIndirectCost = 0;

    public function mount($projectId)
    {
        $this->projectId = $projectId;
        $this->fetchPowInfo();  // Ensure POW info is fetched on mount
    }

    public function fetchPowInfo()
    {
        // Fetch POW related to the given project ID
        $this->pow = Pow::where('project_id', $this->projectId)->first();

        if (!$this->pow) {
            $this->pow = null;
            $this->totalIndirectCost = 0;
            return;
        }

        // Calculate the total indirect cost for this POW
        $this->totalIndirectCost = IndirectCost::where('pow_id', $this->pow->id)->sum('amount');
    }

    public function render()
    {
        // Fetch the project details
        $project = Project::findOrFail($this->projectId);

        // Fetch the POWs related to this project with pagination
        $cards = $project->pows()->paginate(9);

        // Pass data to the view
        return view('livewire.program-of-works', [
            'cards' => $cards,
            'totalIndirectCost' => $this->totalIndirectCost,
        ]);
    }
}
