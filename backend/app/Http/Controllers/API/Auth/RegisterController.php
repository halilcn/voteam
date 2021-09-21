<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Traits\Token;


class RegisterController extends Controller
{
    use Token;

    public function handle(RegisterRequest $request)
    {
        /* array_merge(
                $request->validated(),
                [
                    'image' => $this->createDefaultProfileImage($request->input('name'), $request->input('surname'))
                ]
            )*/
        //image
        $user = User::create($request->validated());
        return $this->createToken($user);
    }
}
