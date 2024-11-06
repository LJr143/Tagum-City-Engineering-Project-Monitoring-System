<?php

namespace App\Livewire;

use App\Models\Material;
use Livewire\Component;

class AddManualMaterial extends Component
{
    public $open = false;
    public $pow_id;
    public $item_no;
    public $quantity;
    public $unit_of_issue;
    public $item_description;
    public $estimated_unit_cost;
    public $estimated_cost;

    protected $rules = [
        'pow_id' => 'required|exists:program_of_works,id',
        'item_no' => 'required|integer',
        'quantity' => 'required|integer',
        'unit_of_issue' => 'required|string|max:50',
        'item_description' => 'required|string|max:255',
        'estimated_unit_cost' => 'required|numeric',
    ];
    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
    }
    public function submit()
    {
        $this->validate();

         Material::create([
             'pow_id' => $this->pow_id,
             'item_no' => $this->item_no,
             'quantity' => $this->quantity,
             'unit_of_issue' => $this->unit_of_issue,
             'item_description' => $this->item_description,
             'estimated_unit_cost' => $this->estimated_unit_cost,
             'estimated_cost' => $this->quantity * $this->estimated_unit_cost,
         ]);

        $this->reset();
        $this->dispatch('material-added');
    }

    public function render()
    {
        return view('livewire.add-manual-material');
    }
}
