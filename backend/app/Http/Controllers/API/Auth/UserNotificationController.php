<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Auth\UserNotificationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserNotificationController extends Controller
{
    public function index(Request $request)
    {
        $NOTIFICATION_LIMIT = 7;
        $createdAtOfLastNotification = $request->input('createdAtOfLastNotification');

        $userNotificationsQuery = $request
            ->user()
            ->notifications()
            ->when($createdAtOfLastNotification, function ($query) use ($createdAtOfLastNotification) {
                return $query->where('created_at', '<', $createdAtOfLastNotification);
            });

        $userNotifications = $userNotificationsQuery->limit($NOTIFICATION_LIMIT)->get();

        $userNotificationsQuery->update(['read_at' => Carbon::now()]);

        return UserNotificationResource::collection($userNotifications);
    }

    public function destroy(Request $request, string $id)
    {
        $request->user()->notifications()->find($id)->delete();

        return $this->successResponse();
    }
}
