<?php

namespace App\Http\Controllers\API\Team;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamCheckUserController extends Controller
{

    /**
     * @param  Team  $team
     * @param  Request  $request
     * @return object
     */
    public function __invoke(Team $team, Request $request): object
    {
        return $this->successResponse([
                                          'team_has_user' => $team->hasUser($request->user()->id)
                                      ]);
    }
}
