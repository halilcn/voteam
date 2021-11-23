<?php

namespace App\Http\Controllers\API\Team;

use App\Http\Controllers\Controller;
use App\Http\Resources\Team\TeamInfoResource;
use App\Models\Team;
use App\Models\VotedUser;

class TeamInfoController extends Controller
{

    /**
     * @param  Team  $team
     * @return TeamInfoResource
     */
    public function __invoke(Team $team): TeamInfoResource
    {
        $VOTE_LOWER_LIMIT = 3;
        $USER_LOWER_LIMIT = 3;

        $team->loadCount('users', 'votes');

        $finishedVotes = $team->votes()->where('end_date', '<', now());
        $finishedVotesCount = $finishedVotes->count();
        $team->vote_join_percentage = null;

        if ($finishedVotesCount > $VOTE_LOWER_LIMIT && $team->users_count > $USER_LOWER_LIMIT) {
            $mustHaveVotesCount = $team->users_count * $finishedVotesCount;
            $totalVotesCount = VotedUser::query()
                ->whereIn('vote_id', $finishedVotes->pluck('id'))
                ->count();
            $team->vote_join_percentage = $totalVotesCount * (100 / $mustHaveVotesCount);
        }

        return TeamInfoResource::make($team);
    }
}
