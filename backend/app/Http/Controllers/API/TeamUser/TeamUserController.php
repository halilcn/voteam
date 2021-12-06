<?php

namespace App\Http\Controllers\API\TeamUser;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamUser\TeamUserResource;
use App\Models\Team;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TeamUserController extends Controller
{
    public function index(Team $team)
    {
        /* return $team
             ->users()
             ->with('role')
             ->withCount([
                             'votes' => function ($query) {
                                 return $query->where('team_id', 45);
                             }
                         ])
             ->get();*/

        // TODO: her role için 1 sorgu atıyor ?
        $teamId = $team->id;

        return TeamUserResource::collection(
            $team
                ->users()
                ->withCount([
                                'votes' => function (Builder $query) use ($teamId) {
                                    return $query->where('team_id', $teamId);
                                }
                            ])
                ->get()
        );
    }
}
