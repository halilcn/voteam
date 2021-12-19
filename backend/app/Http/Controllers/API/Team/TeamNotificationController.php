<?php

namespace App\Http\Controllers\API\Team;

use App\Http\Controllers\Controller;
use App\Http\Resources\Team\TeamNotificationResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamNotificationController extends Controller
{
    /**
     * @param  Team  $team
     * @param  Request  $request
     * @return object
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function __invoke(Team $team, Request $request): object
    {
        $this->authorize('view', $team);

        $NOTIFICATION_LIMIT = 7;
        $idOfLastNotification = $request->input('idOfLastNotification');

        $teamNotifications = $team
            ->notifications()
            ->when($idOfLastNotification, function ($query) use ($idOfLastNotification) {
                return $query->where('id', '<', $idOfLastNotification);
            })
            ->orderByDesc('id')
            ->limit($NOTIFICATION_LIMIT)
            ->get()
            ->map(function ($notification) use ($request) {
                $notification->data = $notification->data[$request->user()->language];
                return $notification;
            });

        return TeamNotificationResource::collection($teamNotifications);
    }
}
