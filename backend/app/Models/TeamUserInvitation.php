<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamUserInvitation extends Model
{
    use HasFactory;

    protected $table = 'team_user_invitations';

    protected $fillable = [
        'random_key',
        'team_id',
        'email',
        'name'
    ];

    /**
     * @return BelongsTo
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

}
