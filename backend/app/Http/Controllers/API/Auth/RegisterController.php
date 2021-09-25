<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterCodeRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\RegisterCodeResource;
use App\Jobs\SendRegisterCode;
use App\Models\User;
use App\Models\UserRegisterCode;
use App\Traits\ApiResponser;
use App\Traits\Token;
use App\Traits\Image;
use Illuminate\Support\Str;


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
        //Todo: register henüz hazır değil! Email code?
        //creatUser ?
        $user = User::query()
            ->create(
                array_merge(
                    $request->validated(),
                    [
                        'image' => $this->createDefaultProfileImage($request->input('name'))
                    ]
                )
            );

        return $this->createToken($user);
    }

    public function checkEmail(RegisterCodeRequest $request): object
    {
        //TODO: data ile sarmalama ?
        return $this->successResponse($this->user->checkExistsEmail($request->input('email')));
    }

    /**
     * @param  RegisterCodeRequest  $request
     * @return object
     */
    public function sendEmail(RegisterCodeRequest $request): object
    {
        $email = $request->input('email');

        //Delete old code if code exists
        UserRegisterCode::query()
            ->where('email', $email)
            ->delete();

        $user = UserRegisterCode::query()
            ->create([
                         'key' => Str::random(),
                         'code' => rand(1000, 9999),
                         'email' => $email
                     ]);

        SendRegisterCode::dispatch($user);

        return $this->successResponse(RegisterCodeResource::make($user));
    }
}
