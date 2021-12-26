<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatedVote extends Model
{
    use HasFactory;

    protected $table = 'calculated_votes';

    protected $fillable = ['vote_id', 'data'];

    protected $casts = [
        'data' => 'json'
    ];
}
