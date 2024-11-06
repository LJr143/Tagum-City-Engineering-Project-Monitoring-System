<?php

namespace App\Livewire;

use App\Models\DirectCost;
use App\Models\IndirectCost;
use Livewire\Component;

class AddManualDirectCost extends Component
{

    public $direct_costs = [['description' => '', 'amount' => '']];
    public $pow_id;

    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
    }

    public function addCost()
    {
        $this->direct_costs[] = ['description' => '', 'amount' => 0];
    }

    public function removeCost($index)
    {
        unset($this->direct_costs[$index]);
        $this->direct_costs = array_values($this->indirect_costs);
    }

    public function saveDirectCosts()
    {
        // Validation
        $this->validate([
            'direct_costs.*.description' => 'required|string|max:255',
            'direct_costs.*.amount' => 'required|numeric|min:0',
        ]);

        foreach ($this->direct_costs as $cost) {
            // Include pow_id when creating each IndirectCost
            DirectCost::create([
                'pow_id' => $this->pow_id, // Adding pow_id to each entry
                'description' => $cost['description'],
                'amount' => $cost['amount'],
            ]);
        }

        // Reset the indirect costs array
        $this->reset('direct_costs');

        // Dispatch an event to indicate the costs have been saved
        $this->dispatch('indirectCostsSaved');
    }

    public function render()
    {
        return view('livewire.add-manual-direct-cost');
    }
}
