<?php

namespace App\Livewire;

use App\Models\PastDeadline;
use Livewire\Component;
use App\Models\Project;
use App\Models\ProjectConfiguration;
use Carbon\Carbon;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ProjectConfigurationSettings extends Component
{
    use WithFileUploads;
    public $projectId;
    public $project;
    public $progress = [];
    public $customDate;
    public $customPercentage;
    public $showCustomDate = false;

    public $newEndDate;
    public $extensionOrderFile;
    public $pastDeadlines = [];

    protected $listeners = ['project-extended'=>'$refresh', 'progress-saved'=>'$refresh'];


    public function mount($projectId)
    {
        $this->projectId = $projectId;
        $this->loadProject();
        $this->initializeProgress();
        $this->pastDeadlines = PastDeadline::where('project_id', $this->projectId)->get();

    }

    private function loadProject(): void
    {
        $this->project = Project::find($this->projectId);
    }

    private function initializeProgress(): void
    {
        $availableDates = $this->getAvailableDates();

        $assignedPercentages = \App\Models\ProjectConfiguration::whereIn('progress_date', $availableDates)
            ->pluck('percentage', 'progress_date')
            ->toArray();


        foreach ($availableDates as $date) {
            $this->progress[] = [
                'date' => $date,
                'percentage' => $assignedPercentages[$date] ?? null,
            ];
        }

    }

    public function saveProgress()
    {
        $this->validate([
            'progress.*.percentage' => 'nullable|numeric|min:0|max:100',
        ]);

        if (!empty($this->progress)) {
            foreach ($this->progress as $progressItem) {
                if (!empty($progressItem['date']) && !empty($progressItem['percentage'])) {
                    ProjectConfiguration::updateOrCreate(
                        [
                            'project_id' => $this->projectId,
                            'progress_date' => $progressItem['date'],
                        ],
                        [
                            'percentage' => $progressItem['percentage'],
                        ]
                    );
                }
            }
        }

        if ($this->newEndDate && $this->extensionOrderFile) {
            $this->extendProjectEndDate();
        }

        $this->dispatch('progress-saved');
    }


    public function addCustomProgress()
    {
        $this->validate([
            'customDate' => 'required|date',
            'customPercentage' => 'required|numeric|min:0|max:100',
        ]);

        ProjectConfiguration::create([
            'project_id' => $this->projectId,
            'progress_date' => $this->customDate,
            'percentage' => $this->customPercentage,
        ]);

        $this->progress[] = [
            'date' => $this->customDate,
            'percentage' => $this->customPercentage,
        ];

        $this->customDate = null;
        $this->customPercentage = null;

        $this->dispatch('progress-saved');
    }

    public function extendProjectEndDate()
    {
        $this->validate([
            'newEndDate' => 'required|date|after:' . $this->project->end_date,
            'extensionOrderFile' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $project = Project::find($this->projectId);

        PastDeadline::create([
            'project_id' => $this->projectId,
            'date' => $project->end_date,
            'set_by' => auth()->user()->id
        ]);

//        $filePath = $this->extensionOrderFile->storeAs(
//            'extensions',
//            'extension_order_project_' . $this->projectId . '_user_' . auth()->id() . '_' . time() . '.pdf'
//        );

        $this->project->update(['end_date' => $this->newEndDate]);

        $this->reset('newEndDate', 'extensionOrderFile');

        $this->pastDeadlines = PastDeadline::where('project_id', $this->projectId)->get();

        $this->dispatch('project-extended');
    }

    private function getAvailableDates()
    {
        $startDate = Carbon::parse($this->project->start_date);
        $endDate = Carbon::parse($this->project->end_date);
        $dates = [];

        while ($startDate <= $endDate) {
            if (in_array($startDate->day, [15, 30])) {
                $dates[] = $startDate->toDateString();
            }
            $startDate->addDay();
        }

        return $dates;
    }

    public function render()
    {
        $availableDates = $this->getAvailableDates();
        $configurations = ProjectConfiguration::where('project_id', $this->projectId)->get();
        return view('livewire.project-configuration-settings', compact('availableDates', 'configurations'));
    }
}
