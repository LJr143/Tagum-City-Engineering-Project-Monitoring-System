<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PowSuspendResume extends Model
{
    use HasFactory;

    protected $fillable = ['pow_id', 'user_id', 'transaction', 'created_at'];


}
