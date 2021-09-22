<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\Token;

class LoginController extends Controller
{
    use Token;

    public User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function handle(LoginRequest $request)
    {
        //TODO: Exceptions ?
        /*??*/
        try {
            $user = $this->user->checkEmail($request->input('email'));
            if (!empty($user)) {
                if ($user->checkPassword($request->input('password'))) {
                    $user->token = $this->createToken($user);
                    return UserResource::make($user);      //ok succes dynamic
                }
            }

            return "yanlış";
        } catch (\Exception $e) {
            abort(401); // dynamic!
        }
    }
}
