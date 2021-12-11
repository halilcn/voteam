<?php

namespace App\Http\Controllers\API\TeamUser;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamUserPermissionController extends Controller
{
    /**
     * @param  Team  $team
     * @param  Request  $request
     * @return object
     */
    public function __invoke(Team $team, Request $request): object
    {
        return $this->successResponse([
                                          'all_permissions' => $team->hasUserAndRole(
                                              $request->user()->id,
                                              Role::$ROLES['LEAD']
                                          )
                                      ]);
    }
}
