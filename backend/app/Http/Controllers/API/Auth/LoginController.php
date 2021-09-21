<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function handle(Request $request)
    {
        try {
            $user = $this->user->checkEmail($request->input('email'));
            return $this->user->checkPassword('asd', 'asdas');
        } catch (\Exception $e) {
            abort(401); // dynamic!
        }
    }
}
