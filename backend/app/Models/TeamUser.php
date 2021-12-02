<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\Pivot;


class TeamUser extends Pivot
{
    use HasFactory;

    protected $table = 'team_user';

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function userPower(): HasOne
    {
        return $this->hasOne(TeamUserPower::class, 'team_user_id', 'id');
    }
}
