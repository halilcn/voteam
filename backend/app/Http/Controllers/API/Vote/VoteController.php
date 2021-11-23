<?php

namespace App\Http\Controllers\API\Vote;

use App\Exceptions\Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\Vote\VoteRequest;
use App\Http\Resources\Vote\VotesResource;
use App\Models\Team;
use App\Models\Vote;
use Illuminate\Support\Carbon;

class VoteController extends Controller
{

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
        $this->authorize('create', [Vote::class, $team]);

        // Power Type
        if ($request->input('type') == Vote::$TYPES['POWER']) {
            // Validate for power vote
            $monthOfNow = Carbon::now()->format('m');
            $monthOfStartDate = Carbon::make($request->input('start_date'))->format('m');
            $selectedDateIsNotThisMonth = $monthOfNow != $monthOfStartDate;

            if ($team->hasPowerTypeVoteThisMonth() || $selectedDateIsNotThisMonth) {
                return Exception::powerVoteTypeException();
            }

            // If it is first power vote
            $firstPowerVote = !$team->powerTypeVote()->exists();
            if ($firstPowerVote) {
                if (!$team->hasMoreThanLowerLimitUsers()) {
                    return Exception::powerVoteTypeException();
                }
            }
        }

        // Check For Other Types
        if ($request->input('type') != Vote::$TYPES['POWER']) {
            $hasCompletedPowerTypeVotes = $team->powerTypeVote()->completedVotes()->exists();

            if (!$hasCompletedPowerTypeVotes) {
                return Exception::powerVoteTypeException();
            }
        }

        $team->votes()->create($request->validated());

        return $this->createdResponse();
    }
}
