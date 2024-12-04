<?php

namespace App\Models;

use App\Notifications\NewProjectCreated;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'baranggay',
        'street',
        'x_axis',
        'y_axis',
        'project_incharge_id',
        'start_date',
        'end_date',
        'description',
        'status',
    ];


    public function pows(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Pow::class);
    }

    public function projectIncharge(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'project_incharge_id', 'id');
    }

    public function delayConfigurations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SystemConfiguration::class);
    }

}

