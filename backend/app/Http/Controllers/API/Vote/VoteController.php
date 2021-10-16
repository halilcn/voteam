<?php

namespace App\Http\Controllers\API\Vote;

use App\Http\Controllers\Controller;
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

    public function store(){
        return "ok";
    }
}
