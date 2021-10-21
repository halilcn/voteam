<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\LogoutController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Team\TeamController;
use App\Http\Controllers\API\Team\TeamJoinWithCodeController;
use App\Http\Controllers\API\Vote\VoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'v1'], function () {
    Route::post('register', [RegisterController::class, 'handle']);
    Route::post('register/email/send', [RegisterController::class, 'sendEmail']);

    Route::post('login', [LoginController::class, 'handle']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::resource('teams', TeamController::class);

        Route::resource('teams.votes', VoteController::class)->scoped(['team' => 'key']);

        Route::post('teams/join', [TeamJoinWithCodeController::class, 'handle']);

        //Route::get('/teams/1212121/users');

        Route::post('logout', [LogoutController::class, 'handle']);
    });
});


