<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';
    protected $fillable = ['key', 'join_code', 'name', 'image'];

    /**
     * @param  string  $value
     * @return string
     */
    public function getJoinCodeAttribute(string $value): string
    {
        return '#'.$value;
    }

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->using(TeamUser::class)
            ->withPivot('role_id')
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
}
