<?php

namespace App\Livewire;

use App\Models\DirectCost;
use App\Models\IndirectCost;
use Livewire\Component;

class AddManualDirectCost extends Component
{

    public $direct_costs = [['description' => '', 'amount' => '', 'item_no' => '', '%_of_total' => '', 'quantity' => '', 'unit' => '', 'unit_cost' => '']];
    public $pow_id;

    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
    }

    public function addCost()
    {
        $this->direct_costs[] = ['description' => '', 'amount' => '', 'item_no' => '', '%_of_total' => '', 'quantity' => '', 'unit' => '', 'unit_cost' => ''];
    }

    public function removeCost($index)
    {
        unset($this->direct_costs[$index]);
        $this->direct_costs = array_values($this->direct_costs);
    }

    public function saveDirectCosts()
    {
        // Validation
        $this->validate([
            'direct_costs.*.item_no' => 'required|string|max:255',
            'direct_costs.*.description' => 'required|string|max:255',
            'direct_costs.*.%_of_total' => 'required|numeric|min:0',
            'direct_costs.*.quantity' => 'required|numeric|min:0',
            'direct_costs.*.unit' => 'required|string|min:0',
            'direct_costs.*.unit_cost' => 'required|numeric|min:0',
        ]);

        foreach ($this->direct_costs as $cost) {
            DirectCost::create([
                'pow_id' => $this->pow_id,
                'item_no' => $cost['item_no'],
                'description' => $cost['description'],
                '%_of_total' => $cost['%_of_total'],
                'quantity' => $cost['quantity'],
                'unit' => $cost['unit'],
                'unit_cost' => $cost['unit_cost'],
                'total_cost' => $cost['unit_cost'] * $cost['quantity'],
                'remaining_cost' => $cost['unit_cost'] * $cost['quantity'],
            ]);
        }

        // Reset the direct costs array
        $this->reset('direct_costs');

        // Dispatch an event to indicate the costs have been saved
        $this->dispatch('directCostsSaved');
    }


    public function render()
    {
        return view('livewire.add-manual-direct-cost');
    }
}
