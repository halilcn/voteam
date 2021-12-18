<?php

namespace App\Http\Controllers\API\Team;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamNotificationController extends Controller
{
    public function __invoke(Team $team, Request $request)
    {
        //TODO: permissions, belli sayıda çekme

        $NOTIFICATION_LIMIT = 2;
        $idOfLastNotification = $request->input('idOfLastNotification');

        $teamNotifications = $team
            ->notifications()
            ->when($idOfLastNotification, function ($query) use ($idOfLastNotification) {
                return $query->where('id', '>', $idOfLastNotification);
            })
            ->orderBy('id')
            ->limit($NOTIFICATION_LIMIT)
            ->get()
            ->map(function ($notification) use ($request) {
                $notification->data = $notification->data[$request->user()->language];
                return $notification;
            });

        return $teamNotifications;
    }
}
