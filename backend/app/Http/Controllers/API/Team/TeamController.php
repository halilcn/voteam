<?php

namespace App\Http\Controllers\API\Team;

use App\Http\Controllers\Controller;
use App\Http\Requests\Team\TeamRequest;
use App\Http\Resources\Team\TeamResource;
use App\Models\Role;
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

    /**
     * @param  TeamRequest  $request
     * @return object
     */
    public function store(TeamRequest $request): object
    {
        //bu gerekli mi?
        //     $this->transaction(function () use ($request) {
        $team = Team::create(['name' => $request->input('name')]);
        $team->users_count = 1;

        return $this->createdResponse(TeamResource::make($team));
        //   });
    }
}
