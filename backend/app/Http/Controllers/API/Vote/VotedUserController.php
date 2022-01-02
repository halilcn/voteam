<?php

namespace App\Http\Controllers\API\Vote;

use App\Exceptions\Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\VOte\VotedUserRequest;
use App\Models\Team;
use App\Models\TeamUser;
use App\Models\Vote;
use App\Models\VotedUser;

class VotedUserController extends Controller
{
    /**
     * @param  Vote  $vote
     * @param  VotedUserRequest  $request
     * @return object
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Vote $vote, VotedUserRequest $request): object
    {
        //TODO: Bad Code

        $this->authorize('create', [VotedUser::class, $vote]);

        /*
         * //TODO: power gücü olanlar sayılır sadece!
        $test=$vote->votedUsers;
        $test2=$vote->team()->with('users.member.userPower')->get();
        return $this->errorResponse($test2);*/

        $votedUsers = $vote
            ->votedUsers()
            ->select('user_id', 'vote_id', 'answer')
            ->get();

        $powerOfUsers = $vote
            ->team()
            ->with('users.member.userPower')
            ->first()
            ->users
            ->map(function ($ach) {
                $teamUser = [];

                $teamUser['user_id'] = $ach->id;
                $teamUser['power'] = $ach->member->userPower->power;

                return $teamUser;
            });

        $percentageOfVotedUsers = $votedUsers->count() * (100 / $powerOfUsers->count());

        $answers = [
            'true' => 0,
            'false' => 0
        ];

        foreach ($votedUsers as $votedUser) {
            $userId = $votedUser['user_id'];
            $power = $powerOfUsers->where('user_id', $userId)->first()['power'];
            $answer = $votedUser['answer']['answer'];

            if ($answer) {
                $answers['true'] += $power;
                continue;
            }

            if (!$answer) {
                $answers['false'] += $power;
            }
        }

        $calculateData = collect();
        if ($answers['true'] >= $answers['false']) {
            //olumlu cevap
        } else {
            //olumsuz cevap
        }

        return $this->errorResponse($answers);

        $userId = $request->user()->id;

        if ($vote->all_users_voted || $vote->end_date->isPast() || $vote->hasUserVoted($userId)) {
            return Exception::votedUserException();
        }

        if ($vote->type != Vote::$TYPES["POWER"] && !$vote->team->hasUserPower($userId)) {
            return Exception::userPowerException();
        }

        // If vote type is power
        if ($vote->type == Vote::$TYPES["POWER"]) {
            $answers = collect($request->input('answer'));
            $userTeamId = $vote
                ->team
                ->users()
                ->where('user_id', $userId)
                ->first()
                ->member
                ->id;

            if ($answers->contains('power', $userTeamId)) {
                return Exception::powerVoteUserException();
            }

            $totalVoteUserPower = 0;
            foreach ($answers->pluck('power') as $item) {
                $totalVoteUserPower += $item;
            }
            if ((int)$totalVoteUserPower != Vote::$TYPES_CONST["TOTAL_VOTE_USER_POWER"]) {
                return Exception::powerVoteTotalUserPowerException();
            }
        }

        $vote->votedUsers()->create([
                                        'user_id' => $userId,
                                        'answer' => $request->input('answer')
                                    ]);

        return $this->createdResponse();
    }
}
