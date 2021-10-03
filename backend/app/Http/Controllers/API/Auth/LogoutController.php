<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * @param  Request  $request
     * @return object
     */
    public function handle(Request $request)
    {
        // Delete all tokens of user
        $request->user()->tokens()->delete();
        return $this->successResponse();
    }
}
