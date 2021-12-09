<?php

namespace App\Http\Controllers\API\TeamUser;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamUser\TeamUserResource;
use App\Models\Team;
use App\Models\TeamUserInvitation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class TeamUserController extends Controller
{
    public function index(Team $team)
    {
        $teamId = $team->id;

        $responseTeam = Team::query()
            ->where('id', $teamId)
            ->with([
                       'users' => function (BelongsToMany $query) use ($teamId) {
                           return $query->withCount([
                                                        'votes' => function (Builder $query) use ($teamId) {
                                                            return $query->where('team_id', $teamId);
                                                        }
                                                    ]);
                       },
                       'invitations:team_id,email,name,created_at'
                   ])
            ->first();

        // TODO: her role için 1 sorgu atıyor ?
        return TeamUserResource::make($responseTeam);
    }
}
