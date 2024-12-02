<?php

namespace App\Livewire;

use App\Models\Material;
use App\Models\MaterialHistory;
use Livewire\Component;

class MakeMaterialReport extends Component
{
    public $materials_update = [['item_no' => '', 'quantity' => '']];
    public $pow_id;

    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
    }

    public function addMaterial()
    {
        $this->materials_update[] = ['item_no' => '', 'quantity' => ''];
    }

    public function removeMaterial($index)
    {
        unset($this->materials_update[$index]);
        $this->materials_update = array_values($this->materials_update);
    }

    public function saveMaterialUpdate()
    {
        // Validation
        $this->validate([
            'materials_update.*.item_no' => 'required|numeric',
            'materials_update.*.quantity' => 'required|numeric|min:1',
        ]);

        foreach ($this->materials_update as $material) {
            // Retrieve the existing material by item_no and pow_id
            $existingMaterial = Material::where('item_no', $material['item_no'])
                ->where('pow_id', $this->pow_id)
                ->first();

            // If the material exists, update the quantity_use and spent_cost
            if ($existingMaterial) {
                $newQuantityUse = $existingMaterial->quantity_use + $material['quantity'];
                $spentCost = $newQuantityUse * $existingMaterial->estimated_unit_cost;

                // Update quantity_use (incremented) and spent_cost
                $existingMaterial->update([
                    'quantity_use' => $newQuantityUse,
                    'spent_cost' => $spentCost,
                ]);

                MaterialHistory::create([
                   'material_id' => $existingMaterial->id,
                   'pow_id' => $this->pow_id,
                   'quantity' => $material['quantity'],
                   'quantity_cost' => $existingMaterial->estimated_unit_cost * $material['quantity'],
                ]);
            }
        }

        // Reset the form fields
        $this->reset(['materials_update']);

        // Dispatch an event to indicate successful save
        $this->dispatch('MaterialUpdateSaved');
    }

    public function render()
    {
        return view('livewire.make-material-report');
    }
}
