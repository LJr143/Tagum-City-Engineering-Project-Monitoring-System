<?php

namespace App\Livewire;
use Livewire\Component;

class SystemConfiguration extends Component
{
    public $warning = [['name' => '', 'percentage' => '', 'color' => '#FF0000']];
    public $termination = [['name' => '', 'percentage' => '', 'color' => '#FF0000']];

    public $terminatedProjects;

    public function mount()
    {
        $this->terminatedProjects = \App\Models\Project::where('status', 'terminated')->get();
    }

    public function addWarning(): void
    {
        $this->warning[] = ['name' => '','percentage' => '', 'color' => '#FF0000'];
    }

    public function removeWarning($index): void
    {
        unset($this->warning[$index]);
        $this->warning = array_values($this->warning);
    }

    public function saveWarning(): void
    {
        $this->validate([
            'warning.*.name' => 'required|string|max:255',
            'warning.*.percentage' => 'required|string|max:255',
            'warning.*.color' => 'required|string|regex:/^#([0-9A-F]{3}){1,2}$/i',
        ]);
        foreach ($this->warning as $warnings) {
            \App\Models\SystemConfiguration::create([
                'name' => $warnings['name'],
                'type' => 'Warning',
                'value' => $warnings['percentage'],
                'color' => $warnings['color'],
            ]);
        }
        $this->warning = [['name' => '', 'percentage' => '', 'color' => '#FF0000']];

        // Dispatch an event
        $this->dispatch('warningSaved');
    }


    public function addTermination(): void
    {
        $this->termination[] = ['name' => '','percentage' => '', 'color' => '#FF0000'];
    }

    public function removeTermination($index): void
    {
        unset($this->termination[$index]);
        $this->termination = array_values($this->termination);
    }

    public function saveTermination(): void

    {
        $this->validate([
            'termination.*.name' => 'required|string|max:255',
            'termination.*.percentage' => 'required|string|max:255',
            'termination.*.color' => 'required|string|regex:/^#([0-9A-F]{3}){1,2}$/i',
        ]);
        foreach ($this->termination as $terminate) {
            \App\Models\SystemConfiguration::create([
                'name' => $terminate['name'],
                'type' => 'Terminate',
                'value' => $terminate['percentage'],
                'color' => $terminate['color'],
            ]);
        }
        $this->termination = [['name' => '', 'percentage' => '', 'color' => '#FF0000']];

        // Dispatch an event
        $this->dispatch('terminationSaved');
    }

    public function deleteWarning($id)
    {
        $warning = \App\Models\SystemConfiguration::find($id);
        if ($warning) {
            $warning->delete();
        }
    }

    public function changeProjectStatus($projectId)
    {
        // Find the project by ID
        $project = \App\Models\Project::find($projectId);

        if ($project) {
            // Change the status of the project (toggle to 'pending' for example)
            $project->status = 'pending';
            $project->save();

            // Optionally, you can refresh the list of terminated projects after status change
            $this->terminatedProjects = \App\Models\Project::where('status', 'terminated')->get();
        }
    }


    public function render()
    {
        $warningConfig = \App\Models\SystemConfiguration::where('type', 'Warning')->get();
        $terminationConfig = \App\Models\SystemConfiguration::where('type', 'Terminate')->get();

        return view('livewire.system-configuration', [
            'warningConfig' => $warningConfig,
            'terminationConfig' => $terminationConfig,
        ]);

    }
}
