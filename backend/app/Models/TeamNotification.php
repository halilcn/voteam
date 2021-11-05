<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamNotification extends Model
{
    use HasFactory;

    public static array $NOTIFICATIONS_TYPES = [
        'VOTE_CREATED' => 'VoteCreated'
    ];

    protected $table = 'team_notifications';
    protected $fillable = [
        'team_id',
        'type',
        'data'
    ];

    protected $casts = [
        'data' => 'json'
    ];
}
