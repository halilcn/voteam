<?php

namespace App\Http\Controllers\API\Auth;

use App\Exceptions\Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserPasswordRequest;
use App\Models\User;
use App\Models\ForgotPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /**
     * @param  Request  $request
     * @return object
     */
    public function store(Request $request): object
    {
        $user = User::query()
            ->where('email', $request->input('email'))
            ->first();

        if (!$user) {
            return Exception::forgotPasswordException();
        }

        $this->transaction(function () use ($user) {
            $user->forgotPassword()->delete();

            $user->forgotPassword()->create(['key' => Str::random()]);
        });

        return $this->createdResponse();
    }

    /**
     * @param  ForgotPassword  $forgotPassword
     * @return object
     */
    public function show(ForgotPassword $forgotPassword): object
    {
        if ($forgotPassword->has_valid_date) {
            return $this->successResponse();
        }

        return Exception::forgotPasswordTimeException();
    }

    /**
     * @param  ForgotPassword  $forgotPassword
     * @param  UserPasswordRequest  $request
     * @return object
     */
    public function destroy(ForgotPassword $forgotPassword, UserPasswordRequest $request): object
    {
        if (!$forgotPassword->has_valid_date) {
            return Exception::forgotPasswordTimeException();
        }

        $this->transaction(function () use ($forgotPassword, $request) {
            $forgotPassword->user()->update(['password' => bcrypt($request->input('password'))]);
            $forgotPassword->delete();
        });

        return $this->successResponse();
    }
}
