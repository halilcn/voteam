<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public static array $ROLES = [
        "LEAD" => "lead",
        "MANAGER" => "manager",
        "MEMBER" => "member"
    ];

    protected $table = 'roles';
    protected $fillable = ['name', 'description', 'permission'];

}
