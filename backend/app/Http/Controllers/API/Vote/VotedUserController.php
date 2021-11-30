<?php

namespace App\Http\Controllers\API\Vote;

use App\Exceptions\Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\VOte\VotedUserRequest;
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
        $this->authorize('create', [VotedUser::class, $vote]);

        $userId = $request->user()->id;

        if ($vote->all_users_voted || $vote->end_date->isPast() || $vote->hasUserVoted($userId)) {
            return Exception::votedUserException();
        }

        if (!$vote->team()->hasUserPower($request->user()->id)) {
            return Exception::userPowerException();
        }

        $vote->votedUsers()->create([
                                        'user_id' => $userId,
                                        'answer' => $request->input('answer')
                                    ]);

        return $this->createdResponse();
    }
}
