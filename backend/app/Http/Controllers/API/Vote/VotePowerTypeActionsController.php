<?php

namespace App\Http\Controllers\API\Vote;

use App\Http\Controllers\Controller;
use App\Http\Resources\Vote\PowerVoteTypeCheckVoteResource;
use App\Models\Team;
use App\Models\Vote;
use Illuminate\Http\Request;

class VotePowerTypeActionsController extends Controller
{
    /**
     * @param  Team  $team
     * @return object
     */
    public function checkVote(Team $team): object
    {
        $powerVoteVoted = $team
            ->powerTypeVote()
            ->completedVotes()
            ->exists();

        return $this->successResponse([
                                          'power_vote_voted' => $powerVoteVoted
                                      ]);
    }

    /**
     * @param  Team  $team
     * @return object
     */
    public function checkStore(Team $team): object
    {
        $isHasActivePowerTypeVote = $team
            ->powerTypeVote()
            ->activeVotes()
            ->exists();

        $isHasMoreThanLowerLimitUsers = $team->hasMoreThanLowerLimitUsers();

        return $this->successResponse([
                                          'has_more_than_lower_limit_users' => $isHasMoreThanLowerLimitUsers,
                                          'has_active_vote' => $isHasActivePowerTypeVote
                                      ]);
    }
}
