<?php

namespace App\Http\Controllers\API\TeamUser;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamUser\TeamUserResource;
use App\Models\Team;
use App\Models\TeamUserInvitation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TeamUserController extends Controller
{
    public function index(Team $team)
    {
        // TODO: her role için 1 sorgu atıyor ?
        /* return $team
             ->users()
             ->with('role')
             ->withCount([
                             'votes' => function ($query) {
                                 return $query->where('team_id', 45);
                             }
                         ])
             ->get();*/

        $teamId = $team->id;
        $users = $team
            ->users()
            ->withCount([
                            'votes' => function (Builder $query) use ($teamId) {
                                return $query->where('team_id', $teamId);
                            }
                        ])
            ->get();

        $userInvitations = $team->invitations()->select('email', 'name', 'created_at')->get();

        //TODO: resource array problem ?
        return TeamUserResource::make(
            [
                'teamUsers' => $users,
                'userInvitations ' => $userInvitations
            ]
        );
    }
}
