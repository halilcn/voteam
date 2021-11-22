<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\LogoutController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Other\FileController;
use App\Http\Controllers\API\Team\TeamController;
use App\Http\Controllers\API\Team\TeamInfoController;
use App\Http\Controllers\API\Team\TeamJoinWithCodeController;
use App\Http\Controllers\API\Vote\VoteController;
use App\Http\Controllers\API\Vote\VotePowerTypeActionsController;
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
        Route::resource('file', FileController::class);

        Route::resource('teams', TeamController::class);
        Route::get('teams/{team:key}/info', TeamInfoController::class);

        // TODO: API urls check
        Route::resource('teams.votes', VoteController::class)->scoped(['team' => 'key']);
        Route::get(
            'teams/{team:key}/vote-types/power/check-vote',
            [VotePowerTypeActionsController::class, 'checkVote']
        );
        Route::get(
            'teams/{team:key}/vote-types/power/check-store',
            [VotePowerTypeActionsController::class, 'checkStore']
        );
        Route::get(
            'teams/{team:key}/vote-types/power/check-time',
            [VotePowerTypeActionsController::class, 'checkTime']
        );

        Route::post('teams/join', [TeamJoinWithCodeController::class, 'handle']);

        //Route::get('/teams/1212121/users');

        Route::post('logout', [LogoutController::class, 'handle']);
    });
});


