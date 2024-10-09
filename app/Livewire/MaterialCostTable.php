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
    public $isOutOfBudget = false;

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

        // Assuming you have a defined project duration in months
        $projectDurationMonths = 6; // Replace with your project's actual duration
        $elapsedMonths = 2; // Replace with the actual number of elapsed months

        // Calculate target progress based on elapsed time
        if ($projectDurationMonths > 0) {
            $this->targetProgressPercentage = ($elapsedMonths / $projectDurationMonths) * 100;
        } else {
            $this->targetProgressPercentage = 0;
        }

        // Calculate the current progress percentage
        if ($this->totalMaterialCost > 0) {
            $this->progressPercentage = ($this->spentCost / $this->totalMaterialCost) * 100;
        } else {
            $this->progressPercentage = 0;
        }

        // Check if the project is out of budget
        $this->isOutOfBudget = $this->spentCost > $this->totalMaterialCost;
    }

    public function render()
    {
        return view('livewire.material-cost-table');
    }
}
