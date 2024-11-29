<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PurchaseOrder;

class ViewPoMaterials extends Component
{
    public $purchaseOrderNumber;
    public $pow_id;
    public $materials = [];

    public function mount($purchaseOrderNumber, $pow_id)
    {
        $this->purchaseOrderNumber = $purchaseOrderNumber;
        $this->pow_id = $pow_id;
        $this->fetchMaterials();
    }

    public function fetchMaterials()
    {
        // Get materials based on purchase_order_number and pow_id
        $this->materials = PurchaseOrder::where('purchase_order_number', $this->purchaseOrderNumber)
            ->where('pow_id', $this->pow_id)
            ->with('material') // Assuming 'material' is a defined relationship in PurchaseOrder
            ->get();
    }

    public function render()
    {
        return view('livewire.view-po-materials');
    }
}
