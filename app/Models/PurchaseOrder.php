<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = ['pow_id', 'purchase_order_number', 'supplier', 'item_no', 'quantity', 'unit_cost', 'total_cost', 'file_name'];

    public function material()
    {
        return $this->belongsTo(Material::class, 'item_no');
    }

}
