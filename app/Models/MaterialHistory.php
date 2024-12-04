<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialHistory extends Model
{
    use HasFactory;

    protected $fillable = ['material_id','pow_id', 'quantity', 'quantity_cost'];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function pow()
    {
        return $this->belongsTo(Pow::class);
    }
}
