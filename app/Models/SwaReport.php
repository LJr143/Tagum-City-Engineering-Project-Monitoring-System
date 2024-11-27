<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SwaReport extends Model
{
    use HasFactory;

    protected $fillable = ['pow_id', 'item_no', 'description', '%_of_total', 'quantity','unit', 'unit_cost', 'total_cost', 'prev_qty', 'prev_unit', 'this_month_qty', 'this_month_unit', 'to_date_qty', 'to_date_unit', 'percent_accomplishment'];


    public function pow()
    {
        return $this->belongsTo(Pow::class);
    }
}
