<?php

namespace App\Http\Controllers\API\TeamUser;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamUserController extends Controller
{
    public function index(Team $team)
    {
        return $team;
    }
}
