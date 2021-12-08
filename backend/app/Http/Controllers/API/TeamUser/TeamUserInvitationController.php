<?php

namespace App\Http\Controllers\API\TeamUser;

use App\Exceptions\Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeamUser\TeamUserInvitationRequest;
use App\Models\Team;
use App\Models\TeamUserInvitation;
use App\Models\User;
use Illuminate\Http\Request;

class TeamUserInvitationController extends Controller
{
    /**
     * @param  Team  $team
     * @param  TeamUserInvitationRequest  $request
     * @return object
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Team $team, TeamUserInvitationRequest $request): object
    {
        $this->authorize('create', [TeamUserInvitation::class, $team]);

        if ($team->users()->where('email', $request->input('email'))->exists()) {
            return Exception::teamUserInvitationException();
        }

        $team->invitations()->where('email', $request->input('email'))->delete();
        $team->invitations()->create($request->validated());

        return $this->createdResponse();
    }
}
