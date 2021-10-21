<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    public static array $TYPES = [
        "DOUBLE" => "double",
        "MULTIPLE" => "multiple"
    ];

    public static array $OPTIONS_TYPES = [
        'TEXT' => 'text',
        'IMAGE' => 'image'
    ];

    protected $table = 'votes';
    protected $fillable = [
        'team_id',
        'user_id',
        'type',
        'options',
        'title',
        'start_date',
        'end_date'
    ];

    protected $casts = [
        'options' => 'json',
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];
}
