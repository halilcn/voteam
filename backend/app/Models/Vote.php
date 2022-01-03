<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vote extends Model
{
    use HasFactory;

    public static array $TYPES = [
        "DOUBLE" => "double",
        "MULTIPLE" => "multiple",
        "POWER" => "power"
    ];

    public static array $OPTIONS_TYPES = [
        'TEXT' => 'text',
        'IMAGE' => 'image'
    ];

    public static array $TYPES_CONST = [
        "TOTAL_VOTE_USER_POWER" => 10000
    ];

    public static int $MINIMUM_VOTED_USERS_PERCENTAGE = 50;

    protected $table = 'votes';
    protected $fillable = [
        'team_id',
        'user_id',
        'type',
        'options',
        'title',
        'all_users_voted',
        'start_date',
        'end_date'
    ];

    protected $casts = [
        'options' => 'json',
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    /**
     * Return completed votes
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeCompletedVotes(Builder $query): Builder
    {
        return $query
            ->where('end_date', '<', now())
            ->orWhere('all_users_voted', true);
    }

    /**
     * Return active votes
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeActiveVotes(Builder $query): Builder
    {
        return $query
            ->where([
                        ['end_date', '>', now()],
                        ['all_users_voted', '=', false]
                    ]);
    }

    /**
     * Check if the user has voted
     * @param  Builder  $query
     * @param  int  $userId
     * @return bool
     */
    public function scopeHasUserVoted(Builder $query, int $userId): bool
    {
        return $this->votedUsers()->where('user_id', $userId)->exists();
    }

    /**
     * Get percentage of user who voted
     * @return int
     */
    public function getVotedPercentageAttribute(): int
    {
        $usersCount = $this->team->users()->count();
        $votedUserCount = $this->votedUsers()->count();

        return self::calculateVotedPercentage($votedUserCount, $usersCount);
    }

    /**
     * Calculate percentage of user who voted
     * @param $votedUserCount
     * @param $usersCount
     * @return int
     */
    public static function calculateVotedPercentage(int $votedUserCount, int $usersCount): int
    {
        return $votedUserCount * (100 / $usersCount);
    }

    /**
     * @return BelongsTo
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * @return HasMany
     */
    public function votedUsers(): HasMany
    {
        return $this->hasMany(VotedUser::class);
    }

    /**
     * @return HasOne
     */
    public function calculation(): HasOne
    {
        return $this->hasOne(CalculatedVote::class);
    }
}
