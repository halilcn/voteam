<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;

class ForgotPassword extends Model
{
    use HasFactory;

    protected $table = 'forgot_password';

    protected $fillable = [
        'user_id',
        'key'
    ];

    /**
     * @return bool
     */
    public function getHasValidDateAttribute(): bool
    {
        return now()->addHours(2) > $this->attributes['created_at'];
    }

    public function scopeHasValidDate(Builder $query)
    {
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
