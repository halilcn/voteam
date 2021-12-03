<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserSettingsRequest;

class UserSettingsController extends Controller
{
    /**
     * @param  UserSettingsRequest  $request
     * @return object
     */
    public function update(UserSettingsRequest $request): object
    {
        $request->user()->update($request->validated());

        return $this->successResponse();
    }
}
