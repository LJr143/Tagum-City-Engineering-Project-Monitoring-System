<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'pow_id',
        'name',
        'designation',
        'rate_per_date',
        'job_order_from',
        'job_order_to',
        'amount',
        'balance',
    ];
}
