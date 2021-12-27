<?php

namespace App\Http\Controllers\API\Vote;

use App\Http\Controllers\Controller;
use App\Http\Resources\Vote\FinishedVotesResource;
use App\Models\Team;
use Illuminate\Http\Request;

class FinishedVoteController extends Controller
{
    public function index(Team $team, Request $request)
    {
        //TODO:  gerçekten bitmiş oylamalar, calculate olup olmadığı
        //TODO: daha fazla yükle btn için hangi parametreler where ile kullanılacak? Oy finished tarihi ?


        $this->authorize('view', $team);

        $FINISHED_VOTE_LIMIT = 7;
        //$idOfLastFinishedVote=$request->input('idOfLastFinishedVote',176);

        $test=$team
            ->votes()
            ->completedVotes()
            ->with('calculation:vote_id')
            /*->when($idOfLastFinishedVote, function ($query) use ($idOfLastFinishedVote) {
                return $query->where('id', '<', $idOfLastFinishedVote);
            })*/
            ->orderByDesc('id')
            ->limit($FINISHED_VOTE_LIMIT)
            ->get();

        return FinishedVotesResource::collection($test);

    }
}
