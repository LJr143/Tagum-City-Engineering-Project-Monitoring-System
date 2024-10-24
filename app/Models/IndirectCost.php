<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndirectCost extends Model
{
    use HasFactory;

    protected $fillable = ['pow_id', 'description', 'amount'];

    public function pow()
    {
        return $this->belongsTo(Pow::class);
    }
}
