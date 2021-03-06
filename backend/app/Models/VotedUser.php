<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * @return BelongsTo
     */
    public function vote(): BelongsTo
    {
        return $this->belongsTo(Vote::class);
    }
}
