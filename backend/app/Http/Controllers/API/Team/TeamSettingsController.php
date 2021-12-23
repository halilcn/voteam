<?php

namespace App\Http\Controllers\API\Team;

use App\Exceptions\Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\Team\TeamSettingRequest;
use App\Http\Resources\Team\TeamSettingResource;
use App\Models\Role;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamSettingsController extends Controller
{
    /**
     * @param  Team  $team
     * @return object
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Team $team): object
    {
        $this->authorize('view', $team);

        return TeamSettingResource::make($team);
    }

    /**
     * @param  Team  $team
     * @param  TeamSettingRequest  $request
     * @return object
     */
    public function update(Team $team, TeamSettingRequest $request): object
    {
        if (!$team->hasUserAndRole($request->user()->id, Role::$ROLES["LEAD"])) {
            return Exception::teamSettingException();
        }

        $team->update($request->validated());

        return $this->successResponse();
    }
}
