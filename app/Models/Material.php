<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'pow_id',
        'item_no',
        'quantity',
        'unit_of_issue',
        'item_description',
        'estimated_unit_cost',
        'estimated_cost',
        'quantity_use',
        'spent_cost',
    ];

    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }


}
