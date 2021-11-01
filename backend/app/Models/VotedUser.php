<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotedUser extends Model
{
    use HasFactory;

    protected $table = 'voted_users';
    protected $fillable = [
        'user_id',
        'vote_id',
        'answer'
    ];

    protected $casts = [
        'answer' => 'json'
    ];
}
