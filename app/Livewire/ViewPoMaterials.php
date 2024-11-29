<?php

namespace App\Livewire;

use AllowDynamicProperties;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Log;
use Livewire\Component;


#[AllowDynamicProperties] class ViewPoMaterials extends Component
{
    public $purchaseOrderNumber;

    public function mount($purchase_order_number): void
    {
        Log::info('Viewing PO number: ' . $purchase_order_number);
        // Retrieve the purchase order number from the URL
        $this->purchaseOrderNumber = $purchase_order_number;

        // Optionally, load the details of the purchase order
        $this->purchaseOrder = PurchaseOrder::where('purchase_order_number', $purchase_order_number)->first();
    }

    public function render()
    {
        return view('livewire.view-po-materials', ['purchaseOrder' => $this->purchaseOrder]);
    }
}

