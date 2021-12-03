<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserLanguageRequest;

class UserLanguageController extends Controller
{
    /**
     * @param  UserLanguageRequest  $request
     * @return object
     */
    public function __invoke(UserLanguageRequest $request): object
    {
        $request->user()->update($request->validated());

        return $this->successResponse();
    }
}
