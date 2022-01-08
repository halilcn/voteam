<?php

namespace App\Http\Controllers\API\Vote;

use App\Exceptions\Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\VOte\VotedUserRequest;
use App\Jobs\Vote\DoubleVoteCalculate;
use App\Jobs\Vote\MultipleVoteCalculate;
use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;
use App\Models\Vote;
use App\Models\VotedUser;
use Carbon\Carbon;

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
         * //TODO: end_date_ güncelleme !
        $test=$vote->votedUsers;
        $test2=$vote->team()->with('users.member.userPower')->get();
        return $this->errorResponse($test2);*/

        $successStatusData = [
            User::$LANGUAGES['TR'] => [
                'status' => true,
                'data' => [
                    'message' => 'Oylama Sonlandı ?'
                ]
            ],
            User::$LANGUAGES['EN'] => [
                'status' => true,
                'data' => [
                    'message' => 'Oylama Sonlandı ?'
                ]
            ]
        ];
        $negativeStatusData = [
            User::$LANGUAGES['TR'] => [
                'status' => false,
                'message' => 'Oylama Reddedildi ',
                'info_message' => 'Kişilerden %50 den katılım az'
            ],
            User::$LANGUAGES['EN'] => [
                'status' => false,
                'message' => 'Oylama Reddedildi ',
                'info_message' => 'Kişilerden %50 den katılım az'
            ]
        ];

        $votedUsers = $vote
            ->votedUsers()
            ->select('user_id', 'vote_id', 'answer')
            ->get();

        $powerOfUsers = $vote
            ->team()
            ->with('users.member.userPower')
            ->first()
            ->users
            ->map(function ($user) {
                $teamUser = [];

                $teamUser['user_id'] = $user->id;
                $teamUser['power'] = $user->member->userPower->power;

                return $teamUser;
            });

        $totalPowersWithAnswers = collect();
        foreach ($votedUsers as $votedUser) {
            $power = $powerOfUsers->where('user_id', $votedUser['user_id'])->first()['power'];

            $answer = $votedUser['answer'];
            $answerType = $votedUser['answer']['type'];
            $isTextAnswerType = $answerType == Vote::$OPTIONS_TYPES['TEXT'];

            $hasAnswer = $totalPowersWithAnswers
                ->where('type', $answerType)
                ->when($isTextAnswerType, function ($query) use ($votedUser) {
                    return $query->where('message', $votedUser['answer']['message']); //dynamic
                })
                ->when(!$isTextAnswerType, function ($query) use ($votedUser) {
                    return $query->where('path', $votedUser['answer']['path']); //dynamic
                })
                ->first();

            if (!$hasAnswer) {
                //yok ise ekle
                $answerType1 = $isTextAnswerType ? 'message' : 'path';
                $answerType2 = $isTextAnswerType ? $votedUser['answer']['message'] : $votedUser['answer']['path'];
                $totalPowersWithAnswers->push([
                                                  'type' => $answerType,
                                                  $answerType1 => $answerType2,
                                                  'total_power' => 0,
                                              ]);
            }

            $totalPowersWithAnswers = $totalPowersWithAnswers
                ->map(function ($test) use ($isTextAnswerType, $votedUser, $power) {
                    if ($test['type'] === $votedUser['answer']['type']) {
                        if ($test['type'] === 'text') {
                            if ($test['message'] === $votedUser['answer']['message']) {
                                $test['total_power'] = $test['total_power'] + $power;
                            }
                        }

                        if ($test['type'] === 'image') {
                            if ($test['path'] === $votedUser['answer']['path']) {
                                $test['total_power'] = $test['total_power'] + $power;
                            }
                        }
                    }

                    return $test;
                });
        }

        $max = $totalPowersWithAnswers->max('total_power');
        $sonuc = $totalPowersWithAnswers->filter(function ($test) use ($max) {
            return $test['total_power'] === $max;
        })
            ->first();
        unset($sonuc['total_power']);

        $enson = collect($successStatusData)->map(function ($item) use ($sonuc) {
            $item['data']['selected_option'] = $sonuc;
            return $item;
        });

        return $this->errorResponse($enson);

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
