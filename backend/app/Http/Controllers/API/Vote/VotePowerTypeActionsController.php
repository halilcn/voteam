<?php

namespace App\Http\Controllers\API\Vote;

use App\Http\Controllers\Controller;
use App\Http\Resources\Vote\VotePowerTypeCheckStoreResource;
use App\Http\Resources\Vote\VotePowerTypeCheckVoteResource;
use App\Models\Team;
use App\Models\Vote;
use Illuminate\Http\Request;

class VotePowerTypeActionsController extends Controller
{


    public function checkVote(Team $team)
    {
        $powerVoteVoted = $team
            ->powerTypeVote()
            ->where('end_date', '<', now())
            ->exists();

        // TODO: sıkıntı
        return VotePowerTypeCheckVoteResource::make(['powerVoteVoted' => $powerVoteVoted]);
    }


    public function checkStore(Team $team)
    {
        $isHasActivePowerTypeVote = $team
            ->powerTypeVote()
            ->where('end_date', '>', now())
            ->exists();


        $isHasMoreThanLowerLimitUsers = $team->hasMoreThanLowerLimitUsers();


        // TODO: sıkıntı
        return VotePowerTypeCheckStoreResource::make(
            [
                'isHasMoreThanLowerLimitUsers' => $isHasMoreThanLowerLimitUsers,
                'isHasActivePowerTypeVote' => $isHasActivePowerTypeVote
            ]
        );
    }
}
