<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

class ForgotPassword extends Model
{
    use HasFactory;

    protected $table = 'forgot_password';

    protected $fillable = [
        'user_id',
        'key'
    ];

    /**
     * Check if it is out of date
     * @return bool
     */
    public function getHasValidDateAttribute(): bool
    {
        return !Carbon::make($this->attributes['created_at'])->addHours(2)->isPast();
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
