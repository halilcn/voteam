<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, EagerLoadPivotTrait;

    public static array $LANGUAGES = [
        'TR' => 'tr',
        'EN' => 'en'
    ];

    public static array $NOTIFICATION_ACTIONS = [
        'CELEBRATION' => 'celebration',
        'INFORMATION' => 'information',
        'INVITATION' => 'invitation'
    ];

    public static array $CONSTANTS = [
        'MIN_UTC' => '-12',
        'MAX_UTC' => '14',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'language',
        'image',
        'utc',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Mutator of password's value
     * @param  string  $password
     */
    public function setPasswordAttribute(string $password): void
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * @param  string  $email
     * @return bool
     */
    public function checkExistsEmail(string $email): bool
    {
        return $this->where('email', $email)->exists();
    }

    /**
     * @param  string  $reqPassword
     * @return bool
     */
    public function checkPassword(string $reqPassword): bool
    {
        return Hash::check($reqPassword, $this->password);
    }

    /**
     * @return BelongsToMany
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class)
            ->using(TeamUser::class)
            ->withPivot('role_id')
            ->as('member')
            ->withTimestamps();
    }

    /**
     * @return HasMany
     */
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    /**
     * @return HasOne
     */
    public function forgotPassword(): HasOne
    {
        return $this->hasOne(ForgotPassword::class);
    }
}
