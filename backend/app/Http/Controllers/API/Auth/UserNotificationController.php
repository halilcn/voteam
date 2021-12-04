<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Auth\UserNotificationResource;
use Illuminate\Http\Request;

class UserNotificationController extends Controller
{
    public function index(Request $request)
    {
        //$user->unreadNotifications()->update(['read_at' => now()]);

        return UserNotificationResource::collection(
            $request
                ->user()
                ->notifications()
                ->get()
        );
    }

    public function destroy(Request $request, string $id)
    {
        $request->user()->notifications()->find($id)->delete();

        return $this->successResponse();
    }
}
