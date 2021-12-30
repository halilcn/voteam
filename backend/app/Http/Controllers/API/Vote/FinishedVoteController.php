<?php

namespace App\Http\Controllers\API\Vote;

use App\Exceptions\Exception;
use App\Http\Controllers\Controller;
use App\Http\Resources\Vote\FinishedVoteDetailResource;
use App\Http\Resources\Vote\FinishedVotesResource;
use App\Models\Team;
use App\Models\Vote;
use Illuminate\Http\Request;

class FinishedVoteController extends Controller
{
    /**
     * @param  Team  $team
     * @param  Request  $request
     * @return object
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Team $team, Request $request): object
    {
        $this->authorize('view', $team);

        $FINISHED_VOTE_LIMIT = 12;
        $totalFinishedVoteCount = $request->input('totalFinishedVoteCount');

        $finishedVotes = $team
            ->votes()
            ->completedVotes()
            ->with('calculation:vote_id')
            ->orderByDesc('end_date')
            ->when($totalFinishedVoteCount, function ($query) use ($totalFinishedVoteCount) {
                return $query->skip($totalFinishedVoteCount);
            })
            ->limit($FINISHED_VOTE_LIMIT)
            ->get();

        return FinishedVotesResource::collection($finishedVotes);
    }

    /**
     * @param  Team  $team
     * @param $voteId
     * @return object
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Team $team, $voteId): object
    {
        $this->authorize('view', $team);

        $vote = $team->votes()->with('calculation')->findOrFail($voteId);

        if (!$vote->calculation) {
            return Exception::voteCalculatedException();
        }

        return FinishedVoteDetailResource::make($vote);
    }
}
