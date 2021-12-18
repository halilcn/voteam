<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Auth\UserNotificationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserNotificationController extends Controller
{
    /**
     * @param  Request  $request
     * @return object
     */
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

        $userNotifications = $userNotificationsQuery
            ->limit($NOTIFICATION_LIMIT)
            ->get()
            ->map(function ($notification) use ($request) {
                $notification->data = $notification->data[$request->user()->language][0];
                return $notification;
            });

        $userNotificationsQuery->update(['read_at' => Carbon::now()]);

        return UserNotificationResource::collection($userNotifications);
    }


    /**
     * @param  Request  $request
     * @param  string  $id
     * @return object
     */
    public function destroy(Request $request, string $id): object
    {
        $request->user()->notifications()->find($id)->delete();

        return $this->successResponse();
    }
}
