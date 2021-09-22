<?php

namespace App\Http\Controllers\API\Auth;

use App\Exceptions\Custom\LoginException;
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
        //return $this->success(['test' => 'ASdasd'], 201);

        try {
            throw new LoginException();
        } catch (\Exception $e) {
            return $this->exceptionResponse($e);
        }

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
