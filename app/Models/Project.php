<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'address',
        'project_cost',
        'description',
    ];


    public function pows(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Pow::class);
    }

}

