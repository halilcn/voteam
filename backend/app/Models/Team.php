<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';
    protected $fillable = ['key', 'join_code', 'name'];

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
}
