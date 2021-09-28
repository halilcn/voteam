<?php

namespace App\Http\Controllers\API\Auth;

use App\Exceptions\Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterCodeRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\RegisterCodeResource;
use App\Jobs\SendRegisterCode;
use App\Models\User;
use App\Models\UserRegisterCode;
use App\Traits\Response\ApiResponser;
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
        //scope ??

        $userRegisterCode = UserRegisterCode::query()
            ->where([
                        'email' => $request->input('user.email'),
                        'key' => $request->input('email.key'),
                        'code' => $request->input('email.code')
                    ])
            ->firstOrFail();


        return $userRegisterCode;

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
