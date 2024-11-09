<?php

namespace App\Livewire;

use App\Models\PurchaseOrder;
use Livewire\Component;

class AddPO extends Component
{
    public $purchase_order = [['item_no' => '', 'quantity' => '', 'unit_cost' => '']];
    public $pow_id;
    public $purchase_order_number;
    public $supplier;

    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
    }

    public function addPoItem()
    {
        $this->purchase_order[] = ['item_no' => '', 'quantity' => '', 'unit_cost' => ''];
    }

    public function removePoItem($index)
    {
        unset($this->purchase_order[$index]);
        $this->purchase_order = array_values($this->purchase_order);
    }

    public function savePoItems()
    {
        // Validation
        $this->validate([
            'purchase_order_number' => 'required|string|max:255',
            'supplier' => 'required|string|max:255',
            'purchase_order.*.item_no' => 'required|string|max:255',
            'purchase_order.*.quantity' => 'required|numeric|min:1',
            'purchase_order.*.unit_cost' => 'required|numeric|min:0',
        ]);

        foreach ($this->purchase_order as $po) {
            PurchaseOrder::create([
                'pow_id' => $this->pow_id,
                'purchase_order_number' => $this->purchase_order_number,
                'supplier' => $this->supplier,
                'item_no' => $po['item_no'],
                'quantity' => $po['quantity'],
                'unit_cost' => $po['unit_cost'],
                'total_cost' => $po['unit_cost'] * $po['quantity'],
            ]);
        }

        // Reset the form fields
        $this->reset(['purchase_order', 'purchase_order_number', 'supplier']);

        // Dispatch an event or emit an event if using Alpine.js
        $this->dispatch('PoItemsSaved');
    }

    public function render()
    {
        return view('livewire.add-p-o');
    }
}
