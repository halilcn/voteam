<?php

namespace App\Http\Controllers\API\Team;

use App\Http\Controllers\Controller;
use App\Http\Requests\Team\TeamRequest;
use App\Http\Resources\Team\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function index(Request $request)
    {
        return $this->successResponse(
            TeamResource::collection(
                $request->user()->teams()->withCount('users')->get()
            )
        );
    }

    public function store(TeamRequest $request)
    {
        //Todo: crate olduğunda geri döndür

        //image ??
        $this->transaction(function () use ($request) {
            $team = Team::create([
                                     'key' => '1234567892',
                                     'join_code' => '12347',
                                     'name' => 'test2'
                                 ]);

            $request->user()->teams()->attach($team->id, ['role_id' => '1']);

            return $team;

            return $this->createdResponse();
        });
    }
}
