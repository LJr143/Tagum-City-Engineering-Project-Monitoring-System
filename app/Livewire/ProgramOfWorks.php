<?php

namespace App\Livewire;

use App\Models\DirectCost;
use App\Models\IndirectCost;
use App\Models\Material;
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

    public $totalMaterialCost = 0;

    public $totalDirectCost = 0;
    public $totalProjectCost = 0;

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
        $this->totalIndirectCost = IndirectCost::where('pow_id', $this->pow->id)
            ->where('description', 'REGEXP', '^[0-9]+(\.?\s|$)') // Match "1 " or "1. "
            ->sum('amount');
        $this->totalMaterialCost = Material::where('pow_id', $this->pow->id)->sum('estimated_cost');
        $this->totalDirectCost = DirectCost::where('pow_id', $this->pow->id)->sum('total_cost');
        $this->totalProjectCost = $this->totalIndirectCost + $this->totalDirectCost;


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
            'totalDirectCost' => $this->totalDirectCost,
            'totalMaterialCost' => $this->totalMaterialCost,
            'totalProjectCost' => $this->totalProjectCost,
        ]);
    }
}
