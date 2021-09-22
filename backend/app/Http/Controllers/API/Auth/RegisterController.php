<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Traits\Token;
use App\Traits\Image;


class RegisterController extends Controller
{
    use Token, Image;

    public function handle(RegisterRequest $request)
    {
        try {
            $user = User::create(
                array_merge(
                    $request->validated(),
                    [
                        'image' => $this->createDefaultProfileImage($request->input('name'))
                    ]
                )
            );

            return $this->createToken($user);
        } catch (\Exception $e) {
            //exception ??
            return response($e->getMessage());
        }
    }
}
