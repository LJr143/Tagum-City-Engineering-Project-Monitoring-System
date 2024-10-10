<?php
namespace App\Livewire;

use App\Models\Material;
use App\Services\LogService;
use Livewire\Component;

class EditMaterial extends Component
{
    public $materialId;
    public $item_description, $quantity, $estimated_unit_cost, $estimated_cost, $quantity_use, $spent_cost;

    protected $rules = [
        'item_description' => 'required|string|max:255',
        'quantity' => 'required|numeric',
        'estimated_cost' => 'required|numeric',
        'estimated_unit_cost' => 'required|numeric',
        'quantity_use' => 'required|numeric',
    ];

    public function mount($materialId)
    {
        $this->materialId = $materialId;
        $material = Material::find($materialId);

        if ($material) {
            $this->item_description = $material->item_description;
            $this->quantity = $material->quantity;
            $this->estimated_cost = $material->estimated_cost;
            $this->estimated_unit_cost = $material->estimated_unit_cost;
            $this->quantity_use = $material->quantity_use;
            $this->spent_cost = $material->spent_cost;
        }
    }

    public function updatedQuantityUse()
    {
        $this->calculateSpentCost();
    }

    public function calculateSpentCost()
    {
        $this->spent_cost = $this->quantity_use * $this->estimated_unit_cost;
    }

    public function submit()
    {
        $this->validate();

        try {
            $material = Material::find($this->materialId);

            if ($material) {
                $material->update([
                    'item_description' => $this->item_description,
                    'quantity' => $this->quantity,
                    'estimated_cost' => $this->estimated_cost,
                    'estimated_unit_cost' => $this->estimated_unit_cost,
                    'quantity_use' => $this->quantity_use,
                    'spent_cost' => $this->spent_cost,
                ]);

                // Optionally don't reset immediately to prevent clearing fields too early
                session()->flash('message', 'Material updated successfully.');
                LogService::logAction(
                    'edited Material',
                    "Edited Material with id: {$this->materialId}",
                    auth()->id()
                );

                // Dispatch event to refresh the parent component or do any necessary actions
                $this->dispatch('material-edited');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred while updating the material: ' . $e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.edit-material');
    }
}
