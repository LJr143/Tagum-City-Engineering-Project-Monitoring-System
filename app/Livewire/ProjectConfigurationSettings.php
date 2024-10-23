<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\ProjectConfiguration;
use Carbon\Carbon;

class ProjectConfigurationSettings extends Component
{
    public $projectId;
    public $project;
    public $progress = [];
    public $customDate;
    public $customPercentage;
    public $showCustomDate = false;


    public function mount($projectId)
    {
        $this->projectId = $projectId;
        $this->loadProject();
        $this->initializeProgress();
    }

    private function loadProject()
    {
        $this->project = Project::find($this->projectId);
    }

    private function initializeProgress()
    {
        $availableDates = $this->getAvailableDates();

        foreach ($availableDates as $date) {
            $this->progress[] = [
                'date' => $date,
                'percentage' => null,
            ];
        }

    }

    public function saveProgress()
    {
        // Validate progress data
        $this->validate([
            'progress.*.percentage' => 'required|numeric|min:0|max:100',
        ]);

        // Save progress for each available date
        foreach ($this->progress as $progressItem) {
            if (isset($progressItem['date']) && isset($progressItem['percentage'])) {
                // Update or create progress based on project_id and progress_date
                ProjectConfiguration::updateOrCreate(
                    [
                        'project_id' => $this->projectId, // Criteria for finding the record
                        'progress_date' => $progressItem['date'], // Criteria for finding the record
                    ],
                    [
                        'percentage' => $progressItem['percentage'], // Data to update
                    ]
                );
            }
        }

        // Emit event after saving progress
        $this->dispatch('progress-saved');
    }

    public function addCustomProgress()
    {
        // Validate custom date and percentage
        $this->validate([
            'customDate' => 'required|date',
            'customPercentage' => 'required|numeric|min:0|max:100',
        ]);

        // Create a new ProjectConfiguration entry
        ProjectConfiguration::create([
            'project_id' => $this->projectId, // Ensure you have the project ID
            'progress_date' => $this->customDate,
            'percentage' => $this->customPercentage,
        ]);

        // Optionally add the custom progress to the progress array for the frontend
        $this->progress[] = [
            'date' => $this->customDate,
            'percentage' => $this->customPercentage,
        ];

        // Reset custom date and percentage after adding
        $this->customDate = null;
        $this->customPercentage = null;

        // Emit event to notify that progress has been saved
        $this->dispatch('progress-saved');
    }


    public function render()
    {
        $availableDates = $this->getAvailableDates();
        $configurations = ProjectConfiguration::where('project_id', $this->projectId)->get();
        return view('livewire.project-configuration-settings', compact('availableDates', 'configurations'));
    }

    private function getAvailableDates()
    {
        $startDate = Carbon::parse($this->project->start_date);
        $endDate = Carbon::parse($this->project->end_date);
        $dates = [];

        // Loop through dates from start to end
        while ($startDate <= $endDate) {
            if (in_array($startDate->day, [15, 30])) {
                $dates[] = $startDate->toDateString();
            }
            $startDate->addDay();
        }

        return $dates;
    }
}
