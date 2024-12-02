<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PurchaseOrder;

class ViewPoMaterials extends Component
{
    public $pow_id;
    public $purchaseOrderNumber;
    public $totalAmount = 0;

    public function mount($pow_id, $purchaseOrderNumber)
    {
        $this->pow_id = $pow_id;
        $this->purchaseOrderNumber = $purchaseOrderNumber;

        logger('POW ID: ' . $this->pow_id);
        logger('Purchase Order Number: ' . $this->purchaseOrderNumber);
    }

    public function render()
    {
        $materials = PurchaseOrder::where('pow_id', $this->pow_id)
            ->where('purchase_order_number', $this->purchaseOrderNumber)
            ->get();

        // Calculate total amount
        $this->totalAmount = $materials->sum('total_cost');

        return view('livewire.view-po-materials', [
            'materials' => $materials,
            'totalAmount' => $this->totalAmount,
        ]);
    }
}
