<?php

namespace App\Livewire;

use Livewire\Component;

class IndirectCosts extends Component
{
    public $indirect_costs = [['description' => '', 'amount' => '']];

    public function addCost()
    {
        $this->indirect_costs[] = ['description' => '', 'amount' => '']; // Add a new field
    }

    public function removeCost($index)
    {
        unset($this->indirect_costs[$index]);
        $this->indirect_costs = array_values($this->indirect_costs); // Re-index array after removal
    }

    public function saveIndirectCosts()
    {
        // Handle validation and saving logic here
        $this->dispatchBrowserEvent('notify', 'Indirect costs saved successfully!');
    }

    public function render()
    {
        return view('livewire.indirect-costs');
    }
}
