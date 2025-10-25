<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class PartyMember extends Model
{
    protected $fillable = [
        'party_id',
        'user_id',
        'name',
        //note jo lesz majd a sharingre, ez alapjan tudja megosztani, a kepeket nem kell Id-ket leakelni
        'code',
        'joined_at',
        'last_seen_at'
    ];

    protected static function booted()
    {
        static::creating(function ($member) {
            if (!$member->code) {
                $member->code = strtoupper(Str::random(8));
            }
        });
    }

    public function party(): BelongsTo
    {
        return $this->belongsTo(Party::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(PartyPhoto::class, 'member_id');
    }

    public function isRegistered(): bool
    {
        return !is_null($this->user_id);
    }
}
