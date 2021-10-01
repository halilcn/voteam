<?php

namespace App\Http\Controllers\API\Team;

use App\Http\Controllers\Controller;
use App\Http\Requests\Team\TeamRequest;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function store(TeamRequest $request)
    {
        //Todo: crate olduğunda geri döndür
        return "ok";
    }
}
