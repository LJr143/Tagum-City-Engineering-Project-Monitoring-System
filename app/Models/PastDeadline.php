<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastDeadline extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'date', 'set_by'];


    public function project(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Project::class, 'project_id', 'id');
    }
}
