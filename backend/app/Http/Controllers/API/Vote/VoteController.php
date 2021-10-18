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
    public function index(Team $team)
    {
        //active, next_date olarak ayırma
        return VotesResource::collection($team->votes);
    }

    public function store(VoteRequest $request)
    {
        // TODO: 2 tip vote burada create edilecek
        // TODO: options'lar burada ayırlacak, diğer field'lar aynı
        // TODO: options multiple olan CDN ile fotoğraflar kaydedilecel (frontend), uzun



        Vote::create()
    }
}
