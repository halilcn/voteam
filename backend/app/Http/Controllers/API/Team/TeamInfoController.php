<?php

namespace App\Http\Controllers\API\Team;

use App\Http\Controllers\Controller;
use App\Http\Resources\Team\TeamInfoResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamInfoController extends Controller
{
    public function __invoke(Team $team): TeamInfoResource
    {
        return TeamInfoResource::make($team->loadCount('users', 'votes'));
    }
}
