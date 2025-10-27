<?php

namespace App\Models;

use App\Enums\RoleEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


/**
 * @mixin IdeHelperEvent
 */
class Event extends Model
{
    use HasFactory;

    public const STATUS_INACTIVE = 0;
    public const STATUS_ACTIVE = 1;
    public const STATUS_ENDED = 2;
    public const STATUS_CANCELED = 3;

    protected $fillable = [
        'name',
        'owner_user_id',
        'join_token',
        'start_at',
        'expire_at',
        'status'
    ];

    protected static function booted(): void
    {
        static::creating(function ($event) {
            if (!$event->join_token) {
                $event->join_token = Str::uuid();
            }
        });

        static::saving(function ($event) {
            if (Auth::check()) {
                $event->updated_by_user_id = Auth::id();
            }
        });
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_user_id');
    }

    public function members(): HasMany
    {
        return $this->hasMany(EventMember::class);
    }

    public function photos()
    {
        return $this->hasMany(EventPhoto::class);
    }

    public function getStatus() {
        if ($this->status == self::STATUS_CANCELED) {
            return self::STATUS_CANCELED;
        }

        $now = Carbon::now();

        if ($this->expires_at && $now->greaterThan($this->expires_at)) {
            return self::STATUS_ENDED;
        }

        if ($this->started_at && $now->lessThan($this->started_at)) {
            return self::STATUS_INACTIVE;
        }

        return self::STATUS_ACTIVE;
    }
}
