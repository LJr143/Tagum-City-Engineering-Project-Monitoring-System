<?php

namespace App\Livewire;

use App\Models\Material;
use Livewire\Component;

class MaterialCostTable extends Component
{
    public $pow_id;
    public $totalMaterialCost = 0;
    public $spentCost = 0;
    public $progressPercentage = 0;
    public $targetProgressPercentage = 0;

    // Mount method to initialize component with the pow_id
    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
        $this->calculateCosts();
    }

    // Calculate the total material cost and spent cost
    public function calculateCosts()
    {
        $materials = Material::where('pow_id', $this->pow_id)->get();

        $this->totalMaterialCost = $materials->sum('estimated_cost');
        $this->spentCost = $materials->sum('spent_cost');

        if ($this->totalMaterialCost > 0) {
            $this->progressPercentage = ($this->spentCost / $this->totalMaterialCost) * 100;
            // Assuming the expected progress is based on time or milestones, calculate target progress
            $this->targetProgressPercentage = $this->progressPercentage; // Replace with actual logic for target
        } else {
            $this->progressPercentage = 0;
            $this->targetProgressPercentage = 0;
        }
    }

    public function render()
    {
        return view('livewire.material-cost-table');
    }
}
