<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use phpDocumentor\Reflection\Types\Mixed_;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'image',
        'password',
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

    //??
    public function checkEmail()
    {
        return $this->where('email', $this->email);
    }

    /**
     * @param  string  $reqPassword
     * @return bool
     */
    public function checkPassword(string $reqPassword): bool
    {
        return Hash::check($reqPassword, $this->password);
    }


}
