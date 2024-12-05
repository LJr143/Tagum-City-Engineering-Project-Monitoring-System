<?php

namespace App\Livewire;

use App\Models\DirectCost;
use App\Models\IndirectCost;
use App\Models\Material;
use App\Models\Payroll;
use App\Models\Pow;
use App\Models\Project;
use App\Models\ProjectConfiguration;
use App\Models\PurchaseOrder;
use Livewire\Component;

class ProgressInformation extends Component
{
    public $pow_id;
    public $pow;
    public $projectConfigurations = []; // Store milestones with deadlines and percentages.

    public $totalLaborCost = 0;
    public $totalMaterialCost = 0;
    public $materialSpentCost = 0;
    public $laborSpentCost = 0;
    public $indirectSpentCost = 0;

    public $projectMaterialCost = 0;
    public $directSpentCost = 0;

    public $remainingMaterialCost = 0;
    public $remainingLaborCost = 0;
    public $remainingIndirectCost = 0;
    public $remainingDirectCost = 0;

    public $usedLaborCost = 0;
    public $usedIndirectCost = 0;
    public $usedDirectCost = 0;
    public $usedPercentage = 0;
    public $totalIndirectCost = 0;

    public $totalDirectCost = 0;

    public $overallProgress = 0;

    public $progress = 0;

    public $saving = 0;

    public $totalPurchaseOrder = 0;


    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
        $this->fetchPowInfo();
        $this->fetchProjectConfigurations();
        $this->calculateCosts();
        $this->calculateOverallProgress();
        $this->calculateSavings();
    }

    public function fetchPowInfo()
    {
        $this->pow = Pow::find($this->pow_id);

        if (!$this->pow) {
            $this->pow = null;
            return;
        }

        // Fetch total indirect costs.
        $this->totalIndirectCost = IndirectCost::where('pow_id', $this->pow->id)
            ->where('description', 'REGEXP', '^[0-9]+(\.?\s|$)') // Match "1 " or "1. "
            ->sum('amount');
        $this->totalDirectCost = DirectCost::where('pow_id', $this->pow_id)->sum('total_cost');

        // Retrieve progress percentage from the found POW record.
        $this->progress = $this->pow->progress_percentage;
    }

    public function fetchProjectConfigurations()
    {
        // Fetch the milestones (with dates and target percentages).
        $this->projectConfigurations = ProjectConfiguration::where('project_id', $this->pow->project_id)
            ->orderBy('progress_date', 'asc')
            ->get();
    }

    public function calculateCosts()
    {
        $materials = Material::where('pow_id', $this->pow_id)->get();
        $labor = Payroll::where('pow_id', $this->pow_id)->get();

        $this->totalMaterialCost = $materials->sum('estimated_cost');
        $this->materialSpentCost = $materials->sum('spent_cost');

        $this->totalLaborCost = $this->pow->total_labor_cost;
        $this->laborSpentCost = $labor->sum('payroll_amount');

        $this->indirectSpentCost = IndirectCost::where('pow_id', $this->pow->id)
            ->where('description', 'REGEXP', '^[0-9]+(\.?\s|$)')
            ->sum('spent_cost');
        $this->directSpentCost = $this->laborSpentCost + $this->materialSpentCost;

        // Calculate remaining costs and used percentages.
        $this->remainingMaterialCost = max(0, $this->totalMaterialCost - $this->materialSpentCost);
        $this->usedPercentage = $this->totalMaterialCost > 0
            ? ($this->materialSpentCost / $this->totalMaterialCost) * 100
            : 0;

        $this->remainingLaborCost = max(0, $this->totalLaborCost - $this->laborSpentCost);
        $this->usedLaborCost = $this->totalLaborCost > 0
            ? ($this->laborSpentCost / $this->totalLaborCost) * 100
            : 0;

        $this->remainingIndirectCost = max(0, $this->totalIndirectCost - $this->indirectSpentCost);
        $this->usedIndirectCost = $this->totalIndirectCost > 0
            ? ($this->indirectSpentCost / $this->totalIndirectCost) * 100
            : 0;

        $this->remainingDirectCost = max(0, $this->totalDirectCost - (($this->totalLaborCost - $this->remainingLaborCost) + ($this->totalMaterialCost - $this->remainingMaterialCost)));
        $this->usedDirectCost = $this->totalDirectCost > 0
            ? ($this->directSpentCost / $this->totalDirectCost) * 100
            : 0;
    }

    public function calculateOverallProgress(): void
    {
        $totalSpentCost = $this->materialSpentCost + $this->laborSpentCost + $this->indirectSpentCost ;
        $totalProjectCost = $this->totalMaterialCost + $this->totalLaborCost + $this->totalIndirectCost;

        $this->overallProgress = $totalProjectCost > 0
            ? ($totalSpentCost / $totalProjectCost) * 100
            : 0;
    }

    public function calculateSavings()
    {
        // Get the total material cost for the project

        $materials = Material::where('pow_id', $this->pow_id)->get();
        $po = PurchaseOrder::where('pow_id', $this->pow_id)->get();
        $totalPurchaseOrderAmount = $po->sum('total_cost');

        // Calculate savings
        return $this->saving = ($this->totalMaterialCost - $totalPurchaseOrderAmount) + $this->remainingMaterialCost + $this->remainingMaterialCost + $this->remainingDirectCost;
    }


    public function render()
    {
        return view('livewire.progress-information', [
            'usedPercentage' => $this->usedPercentage,
            'remainingMaterialCost' => $this->remainingMaterialCost,
            'totalIndirectCost' => $this->totalIndirectCost,
            'remainingLaborCost' => $this->remainingLaborCost,
            'usedLaborCost' => $this->usedLaborCost,
            'remainingIndirectCost' => $this->remainingIndirectCost,
            'usedIndirectCost' => $this->usedIndirectCost,
            'overallProgress' => $this->overallProgress,
            'projectConfigurations' => $this->projectConfigurations,
            'totalProjectSpentCost' => $this->materialSpentCost + $this->laborSpentCost + $this->indirectSpentCost,
            'inputProgress' => $this->progress,
            'saving'=> $this->saving,
        ]);
    }
}
