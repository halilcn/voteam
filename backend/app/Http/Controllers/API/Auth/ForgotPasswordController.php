<?php

namespace App\Http\Controllers\API\Auth;

use App\Exceptions\Exception;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ForgotPassword;
use App\Models\ForgotPassword as ForgotPasswordModel;
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
     * @param  ForgotPasswordModel  $forgotPassword
     * @return object
     */
    public function show(ForgotPasswordModel $forgotPassword): object
    {
        if ($forgotPassword->has_valid_date) {
            return $this->successResponse();
        }

        return Exception::forgotPasswordTimeException();
    }

    public function destroy(Request $request)
    {
        //TODO: link 2 saat aktif kalsın.

    }
}
