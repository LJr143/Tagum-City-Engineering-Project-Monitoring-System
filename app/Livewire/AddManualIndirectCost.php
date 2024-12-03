<?php

namespace App\Livewire;

use App\Models\IndirectCost;
use Livewire\Component;

class AddManualIndirectCost extends Component
{
    public $indirect_costs = [['description' => '', 'amount' => '']];
    public $pow_id;

    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
    }

    public function addCost()
    {
        $this->indirect_costs[] = ['description' => '', 'amount' => 0];
    }

    public function removeCost($index)
    {
        unset($this->indirect_costs[$index]);
        $this->indirect_costs = array_values($this->indirect_costs);
    }

    public function saveIndirectCosts()
    {
        // Validation
        $this->validate([
            'indirect_costs.*.description' => 'required|string|max:255',
            'indirect_costs.*.amount' => 'required|numeric|min:0',
        ]);

        foreach ($this->indirect_costs as $cost) {
            // Include pow_id when creating each IndirectCost
            IndirectCost::create([
                'pow_id' => $this->pow_id, // Adding pow_id to each entry
                'description' => $cost['description'],
                'amount' => $cost['amount'],
            ]);
        }

        // Reset the indirect costs array
        $this->reset('indirect_costs');

        // Dispatch an event to indicate the costs have been saved
        $this->dispatch('indirect-costs-saved');
    }

    public function render()
    {
        return view('livewire.add-manual-indirect-cost');
    }
}
