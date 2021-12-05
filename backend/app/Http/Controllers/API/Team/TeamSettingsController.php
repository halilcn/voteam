<?php

namespace App\Http\Controllers\API\Team;

use App\Http\Controllers\Controller;
use App\Http\Resources\Team\TeamSettingResource;
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
}
