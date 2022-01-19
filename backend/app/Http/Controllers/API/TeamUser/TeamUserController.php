<?php

namespace App\Http\Controllers\API\TeamUser;

use App\Exceptions\Exception;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeamUser\TeamUserResource;
use App\Models\Team;
use App\Models\TeamUser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TeamUserController extends Controller
{
    /**
     * @param  Team  $team
     * @return object
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Team $team): object
    {
        $this->authorize('view', [TeamUser::class, $team]);

        $teamId = $team->id;

        $responseTeam = Team::query()
            ->where('id', $teamId)
            ->with([
                       'invitations:team_id,email,created_at',
                       'users.member.role',
                       'users' => function (BelongsToMany $query) use ($teamId) {
                           return $query->withCount([
                                                        'votes' => function (Builder $query) use ($teamId) {
                                                            return $query->where('team_id', $teamId);
                                                        }
                                                    ]);
                       }
                   ])
            ->first();

        return TeamUserResource::make($responseTeam);
    }

    /**
     * @param  Team  $team
     * @param  TeamUser  $teamUser
     * @return object
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Team $team, TeamUser $teamUser): object
    {
        $this->authorize('delete', [TeamUser::class, $team]);

        if (!$team->hasUser($teamUser->user_id)) {
            return Exception::teamUserException();
        }

        $this->transaction(function () use ($team, $teamUser) {
            $teamUser->userPower()->delete();
            $team->votes()->activeVotes()->each(
                function ($activeVote) use ($teamUser) {
                    $activeVote->votedUsers()->where('user_id', $teamUser->user_id)->delete();
                }
            );
            $team->votes()->activeVotes()->where('user_id', $teamUser->user_id)->each(
                function ($activeVote) use ($teamUser) {
                    $activeVote->votedUsers()->delete();
                }
            );
            $team->votes()->activeVotes()->where('user_id', $teamUser->user_id)->delete();
            $teamUser->delete();
        });

        return $this->successResponse();
    }
}
