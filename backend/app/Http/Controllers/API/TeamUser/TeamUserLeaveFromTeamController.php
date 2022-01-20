<?php

namespace App\Http\Controllers\API\TeamUser;

use App\Exceptions\Exception;
use App\Http\Controllers\Controller;
use App\Jobs\DeleteUserOfTeam;
use App\Models\Team;
use App\Models\TeamUser;
use Illuminate\Http\Request;

class TeamUserLeaveFromTeamController extends Controller
{
    /**
     * @param  Team  $team
     * @param  Request  $request
     * @return object
     */
    public function __invoke(Team $team, Request $request): object
    {
        $teamUser = TeamUser::where(['user_id' => $request->user()->id, 'team_id' => $team->id])->first();

        if (!$team->hasUser($teamUser->user_id)) {
            return Exception::teamUserException();
        }

        DeleteUserOfTeam::dispatchSync($team, $teamUser);

        return $this->successResponse();
    }
}
