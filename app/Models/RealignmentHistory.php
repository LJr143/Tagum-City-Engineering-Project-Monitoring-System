<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealignmentHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'pow_id',
        'source_item_id',
        'source_type',
        'destination_item_id',
        'destination_type',
        'amount',
        'realigned_by',
    ];

    // Polymorphic relationship for source
    public function sourceItem(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    // Polymorphic relationship for destination
    public function destinationItem(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'realigned_by');
    }

    public function pow(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Pow::class, 'pow_id');
    }
}
