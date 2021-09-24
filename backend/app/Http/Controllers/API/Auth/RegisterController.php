<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Jobs\SendRegisterCode;
use App\Models\User;
use App\Traits\ApiResponser;
use App\Traits\Token;
use App\Traits\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class RegisterController extends Controller
{
    use Token, Image, ApiResponser;

    public User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function handle(RegisterRequest $request)
    {
        //creatUser ?
        $user = User::create(
            array_merge(
                $request->validated(),
                [
                    'image' => $this->createDefaultProfileImage($request->input('name'))
                ]
            )
        );

        return $this->createToken($user);
    }

    public function checkEmail(Request $request): object
    {
        //data ile sarmalama ?
        return $this->successResponse($this->user->checkExistsEmail($request->input('email')));
    }

    public function sendEmail(Request $request)
    {
        SendRegisterCode::dispatch();
        return "ok";
    }
}
