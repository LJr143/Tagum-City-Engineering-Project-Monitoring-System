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
    public $projectConfigurations = [];

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

    public $showWarning = false;
    public $warningMessage;



    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
        $this->fetchPowInfo();
        $this->fetchProjectConfigurations();
        $this->calculateCosts();
        $this->calculateOverallProgress();
        $this->updatedProgress();
        $this->calculateSavings();
    }

    public function checkProgress()
    {
        // Fetch all warning thresholds and sort in descending order
        $delayThresholds = \App\Models\SystemConfiguration::where('type', 'Warning')->pluck('value')->sortDesc();

        // Fetch the optional termination threshold, if any
        $terminationThreshold = \App\Models\SystemConfiguration::where('type', 'Terminate')->value('value');

        $this->warningMessage = null; // Reset the warning message

        // Calculate the delay
        $delay = $this->overallProgress - $this->progress;

        // Check for auto-termination only if a termination threshold is set
        if ($terminationThreshold !== null && $delay >= $terminationThreshold) {
            $this->terminateProject();
            return;
        }

        // Iterate through each warning threshold
        foreach ($delayThresholds as $threshold) {
            if ($delay >= $threshold) {
                // Set the warning message with the highest applicable threshold
                $this->warningMessage = "Progress is behind by {$threshold}% or more . Please update.";
                $this->showWarning = true;
                return;
            }
        }

        // If no warning or termination threshold is met, hide the warning
        $this->showWarning = false;
    }

    public function updatedProgress()
    {
        $this->checkProgress();
    }

    public function closeWarning()
    {
        // Check if the project is terminated
        if ($this->showWarning && $this->warningMessage && $this->pow->project->status == 'terminated') {
            // Perform termination logic
            $this->terminateProject();

            // Redirect to the view project route after termination
            return redirect()->route('view-project-pow', ['id' => $this->pow->project->id]);
        }

        // Just close the modal if no termination is required
        $this->showWarning = false;
    }


    protected function terminateProject()
    {
        // Assuming the 'Project' model is related to 'Pow' with a 'project' relation
        $project = $this->pow->project;

        if ($project) {
            $project->status = 'terminated';
            $project->save();

            // Optionally, set a termination message for display
            $this->warningMessage = "Project has been automatically terminated due to delay exceeding the allowed limit.";
            $this->showWarning = true;


        }
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
            'totalProjectSpentCost' => $this->materialSpentCost + $this->laborSpentCost + $this->indirectSpentCost,
            'inputProgress' => $this->progress,
            'saving'=> $this->saving,
        ]);
    }
}
