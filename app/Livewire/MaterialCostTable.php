<?php

namespace App\Livewire;

use App\Models\Material;
use App\Models\Payroll;
use App\Models\Pow;
use App\Models\IndirectCost;
use App\Models\ProjectConfiguration;
use Livewire\Component;

class MaterialCostTable extends ProgressInformation
{
    public $pow_id;
    public $pow;
    public $projectConfigurations = []; // Store milestones with deadlines and percentages.

    public $totalLaborCost = 0;
    public $totalMaterialCost = 0;
    public $materialSpentCost = 0;
    public $laborSpentCost = 0;
    public $indirectSpentCost = 0;

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

    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
        $this->fetchPowInfo();
        $this->fetchProjectConfigurations();
        $this->calculateCosts();
        $this->calculateOverallProgress();
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('livewire.material-cost-table', [
            'usedPercentage' => $this->usedPercentage,
            'remainingMaterialCost' => $this->remainingMaterialCost,
            'totalIndirectCost' => $this->totalIndirectCost,
            'totalDirectCost' => $this->totalDirectCost,
            'remainingLaborCost' => $this->remainingLaborCost,
            'usedLaborCost' => $this->usedLaborCost,
            'remainingIndirectCost' => $this->remainingIndirectCost,
            'remainingDirectCost' => $this->remainingDirectCost,
            'usedIndirectCost' => $this->usedIndirectCost,
            'usedDirectCost' => $this->usedDirectCost,
            'overallProgress' => $this->overallProgress,
            'projectConfigurations' => $this->projectConfigurations,
            'totalProjectSpentCost' => $this->materialSpentCost + $this->laborSpentCost + $this->indirectSpentCost + $this->directSpentCost,
        ]);
    }
}
