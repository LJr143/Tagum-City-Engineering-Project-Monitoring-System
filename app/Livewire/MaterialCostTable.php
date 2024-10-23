<?php

namespace App\Livewire;

use App\Models\Material;
use App\Models\Pow;
use Livewire\Component;

class MaterialCostTable extends Component
{
    public $pow_id;
    public $totalMaterialCost = 0;
    public $materialSpentCost = 0;
    public $remainingMaterialCost = 0;
    public $usedPercentage = 0;

    public $isOutOfBudget;

    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
        $this->calculateCosts();
    }

    public function calculateCosts()
    {
        // Fetch materials associated with the POW
        $materials = Material::where('pow_id', $this->pow_id)->get();

        // Calculate total material and spent cost
        $this->totalMaterialCost = $materials->sum('estimated_cost');
        $this->materialSpentCost = $materials->sum('spent_cost');

        // Avoid division by zero by checking if the total material cost is greater than 0
        if ($this->totalMaterialCost > 0) {
            $this->remainingMaterialCost = $this->totalMaterialCost - $this->materialSpentCost;
            $this->usedPercentage = ($this->materialSpentCost / $this->totalMaterialCost) * 100;
        } else {
            // If totalMaterialCost is zero, handle gracefully
            $this->remainingMaterialCost = 0;
            $this->usedPercentage = 0;
        }
    }


    public function render()
    {
        return view('livewire.material-cost-table', [
            'usedPercentage' => $this->usedPercentage,
            'remainingMaterialCost' => $this->remainingMaterialCost,
        ]);
    }
}
