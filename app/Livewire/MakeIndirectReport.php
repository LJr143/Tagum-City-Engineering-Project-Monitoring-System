<?php

namespace App\Livewire;

use App\Models\IndirectCost;
use Livewire\Component;

class MakeIndirectReport extends Component
{
    public $indirect_update = [['indirect_cost_id' => '', 'amount_used' => '']];
    public $pow_id;

    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
    }

    public function addMaterial()
    {
        $this->indirect_update[] = ['indirect_cost_id' => '', 'amount_used' => ''];
    }

    public function removeMaterial($index)
    {
        unset($this->indirect_update[$index]);
        $this->indirect_update = array_values($this->indirect_update); // Reindex array
    }

    public function saveMaterialUpdate()
    {
        // Validation
        $this->validate([
            'indirect_update.*.indirect_cost_id' => 'required|exists:indirect_costs,id',
            'indirect_update.*.amount_used' => 'required|numeric|min:1',
        ]);

        foreach ($this->indirect_update as $update) {
            $existingMaterial = IndirectCost::where('id', $update['indirect_cost_id'])
                ->where('pow_id', $this->pow_id)
                ->first();

            if ($existingMaterial) {
                $spentCost = $update['amount_used'] + $existingMaterial->spent_cost;

                // Update existing material
                $existingMaterial->update([
                    'spent_cost' => $spentCost,
                ]);
            } else {
                // Handle case if material does not exist (optional)
                $this->dispatch('notify', 'error', 'Invalid material selection.');
                return;
            }
        }

        // Reset the form fields
        $this->reset(['indirect_update']);

        // Dispatch success event
        $this->dispatch('indirect_update');
    }

    public function render()
    {
        return view('livewire.make-indirect-report', [
            'indirect_costs' => IndirectCost::where('pow_id', $this->pow_id)->get(),
        ]);
    }
}
