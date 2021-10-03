<?php

namespace App\Http\Controllers\API\Team;

use App\Http\Controllers\Controller;
use App\Http\Requests\Team\TeamRequest;
use App\Http\Resources\Team\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    /**
     * @param  Request  $request
     * @return object
     */
    public function index(Request $request): object
    {
        return $this->successResponse(
            TeamResource::collection(
                $request
                    ->user()
                    ->teams()
                    ->withCount('users')
                    ->orderByDesc('created_at')
                    ->get()
            )
        );
    }

    /**
     * @param  TeamRequest  $request
     * @return object
     */
    public function store(TeamRequest $request): object
    {
        return $this->transaction(function () use ($request) {
            $team = Team::create(['name' => $request->input('name')]);
            $team->users_count = 1;

            return $this->createdResponse(TeamResource::make($team));
        });
    }
}
