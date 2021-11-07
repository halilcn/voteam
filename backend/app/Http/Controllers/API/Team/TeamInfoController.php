<?php

namespace App\Http\Controllers\API\Team;

use App\Http\Controllers\Controller;
use App\Http\Resources\Team\TeamInfoResource;
use App\Models\Team;
use App\Models\Vote;
use App\Models\VotedUser;
use Illuminate\Http\Request;

class TeamInfoController extends Controller
{

    /**
     * @param  Team  $team
     * @return TeamInfoResource
     */
    public function __invoke(Team $team): TeamInfoResource
    {
        $team->loadCount('users', 'votes');

        $finishedVotes = $team->votes()->where('end_date', '<', now());
        $finishedVotesCount = $finishedVotes->count();
        $team->vote_join_percentage = null;

        if ($finishedVotesCount > 3 && $team->users_count >= 4) {
            $mustHaveVotesCount = $team->users_count * $finishedVotesCount;
            $totalVotesCount = VotedUser::query()
                ->whereIn('vote_id', $finishedVotes->pluck('id'))
                ->count();
            $team->vote_join_percentage = $totalVotesCount * (100 / $mustHaveVotesCount);
        }

        return TeamInfoResource::make($team);
    }
}
