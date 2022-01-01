<?php

namespace App\Http\Controllers\API\Vote;

use App\Exceptions\Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\Vote\VoteRequest;
use App\Http\Resources\Vote\VoteResource;
use App\Http\Resources\Vote\VotesResource;
use App\Models\Team;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class VoteController extends Controller
{

    //TODO: !!
    public function index(Team $team)
    {
        $this->authorize('view', [Vote::class, $team]);

        // TODO: !
        return $team
            ->votes()
            ->activeVotes()
            ->with([
                       'votedUsers:vote_id,user_id',
                       'team' => function ($query) {
                           $query->withCount('users');  //Boşuna sorguları kes !
                       }
                   ])
            ->orderBy('start_date')
            ->get()
            ->transform(function ($vote) {
                $vote['voted_users_id'] = $vote['voted_users'];
                return $vote;
            });

        // TODO: query problem.
        return VotesResource::make(
            $team
                ->votes()
                ->activeVotes()
                ->with('votedUsers:vote_id,user_id')
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

            $notHasUserPower = !$team->hasUserPower($request->user()->id);
            if ($notHasUserPower) {
                return Exception::userPowerException();
            }
        }

        $team->votes()->create($request->validated());

        return $this->createdResponse();
    }

    /**
     * @param  Team  $team
     * @param  Vote  $vote
     * @return VoteResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Team $team, Vote $vote, Request $request): VoteResource
    {
        $this->authorize('view', [Vote::class, $team]);

        if ($vote->type === Vote::$TYPES['POWER']) {
            $vote->options = $team
                ->users()
                ->where('user_id', '!=', $request->user()->id)
                ->select('name', 'image')
                ->get()
                ->transform(function ($user) {
                    $user->team_user_id = $user->member->id;
                    unset($user["member"]);
                    return $user;
                });
        }

        return VoteResource::make($vote);
    }
}
