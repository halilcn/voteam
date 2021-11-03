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
    //TODO: Observer, query çok fazla ?

    /**
     * @param  Team  $team
     * @return VotesResource
     */
    public function index(Team $team): VotesResource
    {
        // TODO: Performance(Çok fazla sorgu atıyor!) ?
        return VotesResource::make(
            $team
                ->votes()
                ->whereDate('end_date', '>', now())
                ->orderBy('start_date', 'asc')
                ->get()
        );
    }


    /**
     * @param  VoteRequest  $request
     * @param  Team  $team
     * @return object
     */
    public function store(VoteRequest $request, Team $team): object
    {
        $team->votes()->create($request->validated());
        return $this->createdResponse();
    }
}
