<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartyPhoto extends Model
{
    protected $fillable = [
        'party_id',
        'member_id',
        'image_path',
        'prompt',
        'type',
        'status',
    ];

    public function party()
    {
        return $this->belongsTo(Party::class);
    }

    public function member()
    {
        return $this->belongsTo(PartyMember::class, 'member_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getUrlAttribute(): string
    {
        return asset('storage/' . $this->image_path);
    }
}
