<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectCost extends Model
{
    use HasFactory;

    protected $fillable = ['pow_id', 'item_no', 'description', '%_of_total', 'quantity','unit', 'unit_cost', 'spent_cost',  'remaining_cost',];


    public function pow()
    {
        return $this->belongsTo(Pow::class);
    }
}
