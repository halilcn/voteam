<?php

namespace App\Http\Controllers\API\Auth;

use App\Exceptions\Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterCodeRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\RegisterCodeResource;
use App\Models\User;
use App\Models\UserRegisterCode;


class RegisterController extends Controller
{
    public User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * @param  RegisterRequest  $request
     * @return object
     */
    public function handle(RegisterRequest $request): object
    {
        $userRegisterCode = UserRegisterCode::query()
            ->where([
                        'email' => $request->input('user.email'),
                        'key' => $request->input('email.key'),
                        'code' => $request->input('email.code')
                    ])
            ->first();

        if (!$userRegisterCode) {
            return Exception::registerException();
        }

        $userRegisterCode->delete();

        $this->user->create($request->validated()['user']);

        return $this->createdResponse();
    }

    /**
     * @param  RegisterCodeRequest  $request
     * @return object
     */
    public function sendEmail(RegisterCodeRequest $request): object
    {
        $email = $request->input('email');

        if ($this->user->checkExistsEmail($email)) {
            return Exception::registerEmailException();
        }

        //Delete old code if code exists
        UserRegisterCode::query()
            ->where('email', $email)
            ->delete();

        $userRegisterCode = UserRegisterCode::create(['email' => $email]);

        return $this->createdResponse(RegisterCodeResource::make($userRegisterCode));
    }
}
