<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Party extends Model
{
    protected $fillable = [
        'name',
        'owner_user_id',
        'join_token',
        'expires_at',
        'status'
    ];

    protected static function booted()
    {
        static::creating(function ($party) {
            if (!$party->join_token) {
                $party->join_token = Str::uuid();
            }
        });
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_user_id');
    }

    public function members(): BelongsToMany
    {
        return $this->hasMany(PartyMember::class);
    }

    public function photos()
    {
        return $this->hasMany(PartyPhoto::class);
    }

    public function isActive(): bool
    {
        return $this->status == 1 &&
            (!$this->expires_at || now()->lt($this->expires_at));
    }
}
