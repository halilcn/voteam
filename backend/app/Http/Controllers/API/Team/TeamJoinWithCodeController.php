<?php

namespace App\Http\Controllers\API\Team;

use App\Exceptions\Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\Team\TeamJoinCodeRequest;
use App\Http\Resources\Team\TeamResource;
use App\Jobs\JoinTeam;
use App\Models\Role;
use App\Models\Team;
use Illuminate\Database\Eloquent\Builder;

class TeamJoinWithCodeController extends Controller
{
    /**
     * @param  TeamJoinCodeRequest  $request
     * @return object
     */
    public function __invoke(TeamJoinCodeRequest $request): object
    {
        $team = Team::query()
            ->where('join_code', $request->input('code'))
            ->whereDoesntHave('users', function (Builder $query) use ($request) {
                $query->where('user_id', $request->user()->id);
            })
            ->first();

        JoinTeam::dispatchSync($team);

        $team->loadCount('users');

        return $this->createdResponse(TeamResource::make($team));
    }
}
