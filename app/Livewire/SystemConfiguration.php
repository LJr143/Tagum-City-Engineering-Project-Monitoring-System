<?php

namespace App\Livewire;
use Livewire\Component;

class SystemConfiguration extends Component
{
    public $warning = [[ 'name' => '', 'percentage' => '', 'color' => '']];

    public function mount(): void
    {
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
        // Validation
        $this->validate([
            'warning.*.name' => 'required|string|max:255',
            'warning.*.percentage' => 'required|string|max:255',
            'warning.*.color' => 'required|numeric|min:0',
        ]);

        foreach ($this->warning as $warnings) {
            \App\Models\SystemConfiguration::create([
                'name' => $warnings['name'],
                'type' => $warnings['type'],
                'value' => $warnings['percentage'],
                'color' => $warnings['color'],
            ]);
        }

        // Reset the direct costs array
        $this->reset('warning');

        // Dispatch an event to indicate the costs have been saved
        $this->dispatch('warningSaved');
    }
    public function render()
    {
        return view('livewire.system-configuration');
    }
}
