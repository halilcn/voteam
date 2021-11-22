<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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


    public function scopeVotedPercentage($query)
    {
    }

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
     * Get percentage of user who voted
     * @return int
     */
    public function getVotedPercentageAttribute(): int
    {
        $usersCount = $this->team->users()->count();
        $votedUserCount = $this->votedUsers()->count();

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
}
