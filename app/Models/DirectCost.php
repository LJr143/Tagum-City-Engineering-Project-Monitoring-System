<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectCost extends Model
{
    use HasFactory;


    protected $fillable = ['pow_id', 'description', 'amount',   'remaining_cost',];

    public function pow()
    {
        return $this->belongsTo(Pow::class);
    }
}
