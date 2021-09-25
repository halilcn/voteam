<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRegisterCode extends Model
{
    use HasFactory;

    protected $table = 'user_register_codes';
    protected $fillable = ['key', 'code', 'email'];
}
