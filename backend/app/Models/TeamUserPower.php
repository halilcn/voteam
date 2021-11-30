<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamUserPower extends Model
{
    use HasFactory;

    protected $table = 'team_user_powers';

    protected $fillable = ['team_user_id', 'power'];
}
