<?php

namespace App\Http\Controllers\API\TeamUser;

use App\Exceptions\Exception;
use App\Http\Controllers\Controller;
use App\Jobs\JoinTeam;
use App\Models\Role;
use App\Models\Team;
use App\Models\TeamUserInvitation;
use Illuminate\Http\Request;

class TeamJoinWithInvitationController extends Controller
{
    /**
     * @param  Request  $request
     * @return object
     */
    public function __invoke(Request $request): object
    {
        $teamInvitation = TeamUserInvitation::query()
            ->where('random_key', $request->input('invitationKey'))
            ->first();

        if (!$teamInvitation) {
            return Exception::teamUserInvitationException();
        }

        JoinTeam::dispatchSync(Team::find($teamInvitation->team_id));
        $teamInvitation->delete();

        return $this->successResponse();
    }
}
