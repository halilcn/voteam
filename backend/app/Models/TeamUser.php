<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\Pivot;


class TeamUser extends Pivot
{
    use HasFactory;

    protected $table = 'team_user';


    /**
     * @return HasOne
     */
    public function role(): HasOne
    {
        return $this->hasOne(Role::class);
    }
}
