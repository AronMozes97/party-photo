<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperEventPhoto
 */
class EventPhoto extends Model
{
    public const STATUS_ACTIVE = 1;

    protected $fillable = [
        'event_id',
        'member_id',
        'image_path',
        'status',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(EventMember::class, 'member_id');
    }

    public function scopeActive($query): EventPhoto
    {
        return $query->where('status', 'active');
    }

    public function getUrlAttribute(): string
    {
        return asset('storage/' . $this->image_path);
    }
}
