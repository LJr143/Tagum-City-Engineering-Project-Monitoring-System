<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pow extends Model
{
    use HasFactory;

    // Explicitly set the table name
    protected $table = 'program_of_works';

    // Specify which attributes can be mass assigned
    protected $fillable = [
        'reference_number',
        'description',
        'start_date',
        'end_date',
        'engineer_id',
        'total_material_cost',
        'total_labor_cost',
        'project_id',
    ];

    public function project(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function engineer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'engineer_id');
    }

}
