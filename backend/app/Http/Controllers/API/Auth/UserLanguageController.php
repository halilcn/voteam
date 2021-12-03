<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserLanguageRequest;
use Illuminate\Http\Request;

class UserLanguageController extends Controller
{
    public function __invoke(UserLanguageRequest $request): object
    {
        $request->user()->update($request->validated());

        return $this->successResponse();
    }
}
