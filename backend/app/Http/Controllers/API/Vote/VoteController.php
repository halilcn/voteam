<?php

namespace App\Http\Controllers\API\Vote;

use App\Exceptions\Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\Vote\VoteRequest;
use App\Http\Resources\Vote\VotesResource;
use App\Models\Team;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    // TODO: Policy check

    /**
     * @param  Team  $team
     * @return VotesResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Team $team): VotesResource
    {
        $this->authorize('show', [Vote::class, $team]);

        // TODO: query problem.
        return VotesResource::make(
            $team
                ->votes()
                ->activeVotes()
                ->orderBy('start_date')
                ->get()
        );
    }


    /**
     * @param  VoteRequest  $request
     * @param  Team  $team
     * @return object
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(VoteRequest $request, Team $team): object
    {
        // TODO: Manuel olarak güç oylaması öne çekilebilir mi ? ++Çekilebiliyorsa oylama başlata seçenek konmalı mı ?

        $this->authorize('create', [Vote::class, $team]);

        // Power Type
        if ($request->input('type') == Vote::$TYPES['POWER']) {
            //TODO: Her ay 1 tane power vote olmalıdır. O ay manuel power vote başlatılmadıysa cron tarafından başlatılır.
            if (!$team->hasMoreThanLowerLimitUsers()) {
                return Exception::powerVoteTypeException();
            }
            //TODO: default request input (frontend tarafında yapılırsa ?)
        }

        // Check For Other Types
        if ($request->input('type') != Vote::$TYPES['POWER']) {
            $hasCompletedPowerTypeVotes = $team->powerTypeVote()->completedVote()->exists();

            if (!$hasCompletedPowerTypeVotes) {
                return Exception::powerVoteTypeException();
            }
        }


        $team->votes()->create($request->validated());

        return $this->createdResponse();
    }
}
