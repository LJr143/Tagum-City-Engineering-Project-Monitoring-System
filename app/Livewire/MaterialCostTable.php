<?php

namespace App\Livewire;

use App\Models\Material;
use App\Models\Payroll;
use App\Models\Pow;
use App\Models\IndirectCost; // Import the IndirectCost model
use Livewire\Component;

class MaterialCostTable extends Component
{
    public $pow_id;

    public $totalLaborCost = 0;
    public $totalMaterialCost = 0;
    public $materialSpentCost = 0;
    public $laborSpentCost = 0;

    public $indirectSpentCost = 0;
    public $remainingMaterialCost = 0;
    public $remainingLaborCost = 0;
    public $remainingIndirectCost = 0;

    public $usedLaborCost = 0;
    public $usedIndirectCost = 0;
    public $usedPercentage = 0;
    public $totalIndirectCost = 0;

    public $isOutOfBudget;
    public $pow;

    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
        $this->fetchPowInfo(); // Fetch Pow information
        $this->calculateCosts();
    }

    /**
     * Fetch the Pow information associated with the pow_id.
     */
    public function fetchPowInfo()
    {
        // Fetch the POW record
        $this->pow = Pow::find($this->pow_id);

        // Handle the case where Pow may not be found
        if (!$this->pow) {
            $this->pow = null; // or any default value
            return; // Exit early if no POW found
        }

        // Now that we have confirmed the Pow exists, fetch indirect costs
        $this->totalIndirectCost = IndirectCost::where('pow_id', $this->pow_id)->sum('amount');

    }

    public function calculateCosts()
    {
        // Fetch materials associated with the POW
        $materials = Material::where('pow_id', $this->pow_id)->get();
        $labor = Payroll::where('pow_id', $this->pow_id)->get();

        // Calculate total material and spent cost
        $this->totalMaterialCost = $materials->sum('estimated_cost');
        $this->totalLaborCost = $this->pow->total_labor_cost;
        $this->materialSpentCost = $materials->sum('spent_cost');
        $this->laborSpentCost = $labor->sum('payroll_amount');

        if ($this->totalMaterialCost > 0) {
            $this->remainingMaterialCost = $this->totalMaterialCost - $this->materialSpentCost;
            $this->usedPercentage = ($this->materialSpentCost / $this->totalMaterialCost) * 100;
        } else {
            $this->remainingMaterialCost = 0;
            $this->usedPercentage = 0;
        }

        if ($this->totalLaborCost > 0) {
            $this->remainingLaborCost = $this->totalLaborCost - $this->laborSpentCost;
            $this->usedLaborCost = ($this->laborSpentCost / $this->totalLaborCost) * 100;
        } else {
            $this->remainingLaborCost = 0;
            $this->usedLaborCost = 0;
        }

        if ($this->totalIndirectCost > 0) {
            $this->remainingIndirectCost = $this->totalIndirectCost - $this->indirectSpentCost;
            $this->usedIndirectCost = ($this->indirectSpentCost / $this->totalIndirectCost) * 100;
        } else {
            $this->remainingIndirectCost = 0;
            $this->usedIndirectCost = 0;
        }
    }

    public function render()
    {
        return view('livewire.material-cost-table', [
            'usedPercentage' => $this->usedPercentage,
            'remainingMaterialCost' => $this->remainingMaterialCost,
            'totalIndirectCost' => $this->totalIndirectCost,
            'remainingLaborCost' => $this->remainingLaborCost,
            'usedLaborCost' => $this->usedLaborCost,
            'remainingIndirectCost' => $this->remainingIndirectCost,
            'usedIndirectCost' => $this->usedIndirectCost,
            'totalProjectSpentCost' => $this->materialSpentCost + $this->laborSpentCost + $this->indirectSpentCost,
        ]);
    }
}
