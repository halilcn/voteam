<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;

class Team extends Model
{
    use HasFactory,EagerLoadPivotTrait;

    protected $table = 'teams';
    protected $fillable = ['key', 'join_code', 'name', 'image'];

    public static int $USER_LOWER_LIMIT = 3;

    /**
     * @param  string  $value
     * @return string
     */
    public function getJoinCodeAttribute(string $value): string
    {
        return '#'.$value;
    }

    /**
     * Checks if it has more users than the lower limit
     * @param  Builder  $query
     * @return bool
     */
    public function scopeHasMoreThanLowerLimitUsers(Builder $query): bool
    {
        return $this->users()->count() >= self::$USER_LOWER_LIMIT;
    }

    /**
     * Return Power Type Vote
     * @param  Builder  $query
     * @return HasMany
     */
    public function scopePowerTypeVote(Builder $query): HasMany
    {
        return $this->votes()->where(['type' => Vote::$TYPES['POWER']]);
    }

    /**
     * Team has power type vote this month
     * @param  Builder  $query
     * @return bool
     */
    public function scopeHasPowerTypeVoteThisMonth(Builder $query): bool
    {
        return $query
            ->powerTypeVote()
            ->whereMonth('start_date', Carbon::now()->format('m'))
            ->exists();
    }

    /**
     * Team has user
     * @param  Builder  $query
     * @param  int  $userId
     * @return bool
     */
    public function scopeHasUser(Builder $query, int $userId): bool
    {
        return $this
            ->users()
            ->where('user_id', $userId)
            ->exists();
    }

    /**
     *  User of team has user power
     * @param  Builder  $query
     * @param  int  $userId
     * @return bool
     */
    public function scopeHasUserPower(Builder $query, int $userId): bool
    {
        return $this
                ->users()
                ->wherePivot('user_id', $userId)
                ->first()
                ->member
                ->userPower != [];
    }

    /**
     * User of team has role that came as $role
     * @param  Builder  $query
     * @param  int  $user_id
     * @param  string  $role
     * @return bool
     */
    public function scopeHasUserAndRole(Builder $query, int $userId, string $role): bool
    {
        return $this
                ->users()
                ->where('user_id', $userId)
                ->first()
                ->member
                ->role
                ->name === $role;
    }

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->using(TeamUser::class)
            ->withPivot('role_id', 'id')
            ->as('member')
            ->withTimestamps();
    }

    /**
     * @return HasMany
     */
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    /**
     * @return HasMany
     */
    public function notifications(): HasMany
    {
        return $this->hasMany(TeamNotification::class);
    }

    /**
     * @return HasMany
     */
    public function invitations(): HasMany
    {
        return $this->hasMany(TeamUserInvitation::class);
    }
}
