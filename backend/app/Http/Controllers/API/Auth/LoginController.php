<?php

namespace App\Http\Controllers\API\Auth;

use App\Exceptions\Custom\LoginException;
use App\Exceptions\Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\Token;

class LoginController extends Controller
{
    use Token;

    /**
     * @param  LoginRequest  $request
     * @return object
     */
    public function handle(LoginRequest $request): object
    {
        $user = User::where('email', $request->input('email'))->first();

        if (!empty($user)) {
            if ($user->checkPassword($request->input('password'))) {
                $user->token = $this->createToken($user);
                return $this->successResponse(UserResource::make($user));
            }
        }

        return Exception::loginException();
    }
}
