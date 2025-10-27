<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property int|null $owner_user_id
 * @property string $join_token
 * @property string|null $start_at
 * @property string|null $expire_at
 * @property int $status
 * @property int|null $updated_by_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EventMember> $members
 * @property-read int|null $members_count
 * @property-read \App\Models\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EventPhoto> $photos
 * @property-read int|null $photos_count
 * @method static \Database\Factories\EventFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event whereExpireAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event whereJoinToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event whereOwnerUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event whereUpdatedByUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEvent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $event_id
 * @property int|null $user_id
 * @property string|null $name
 * @property string $code
 * @property string $joined_at
 * @property string|null $last_seen_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Event $event
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EventPhoto> $photos
 * @property-read int|null $photos_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventMember query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventMember whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventMember whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventMember whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventMember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventMember whereJoinedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventMember whereLastSeenAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventMember whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventMember whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventMember whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEventMember {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $event_id
 * @property int $member_id
 * @property string $image_path
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Event $event
 * @property-read string $url
 * @property-read \App\Models\EventMember $member
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventPhoto active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventPhoto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventPhoto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventPhoto query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventPhoto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventPhoto whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventPhoto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventPhoto whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventPhoto whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventPhoto whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventPhoto whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEventPhoto {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutRole($roles, $guard = null)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUser {}
}

