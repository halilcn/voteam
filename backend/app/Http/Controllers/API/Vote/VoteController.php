<?php

namespace App\Http\Controllers\API\Vote;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vote\VoteRequest;
use App\Http\Resources\Vote\VotesResource;
use App\Models\Team;
use App\Models\Vote;
use Illuminate\Http\Request;

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
                ->whereDate('end_date', '>', now())
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

        $team->votes()->create($request->validated());

        return $this->createdResponse();
    }
}
