<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\LogoutController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Auth\UserLanguageController;
use App\Http\Controllers\API\Auth\UserNotificationController;
use App\Http\Controllers\API\Auth\UserSettingsController;
use App\Http\Controllers\API\Other\FileController;
use App\Http\Controllers\API\Team\TeamController;
use App\Http\Controllers\API\Team\TeamInfoController;
use App\Http\Controllers\API\Team\TeamJoinWithCodeController;
use App\Http\Controllers\API\Team\TeamSettingsController;
use App\Http\Controllers\API\Team\TeamCheckUserController;
use App\Http\Controllers\API\TeamUser\TeamUserController;
use App\Http\Controllers\API\Vote\VotedUserController;
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

//TODO: Routes

Route::group(['prefix' => 'v1'], function () {
    Route::post('register', [RegisterController::class, 'handle']);
    Route::post('register/email/send', [RegisterController::class, 'sendEmail']);

    Route::post('login', [LoginController::class, 'handle']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::put('user/language', UserLanguageController::class);
        Route::put('user/settings', [UserSettingsController::class, 'update']);
        Route::resource('user/notifications', UserNotificationController::class);

        Route::resource('file', FileController::class);

        Route::resource('teams', TeamController::class);
        Route::get('teams/{team:key}/check-user', TeamCheckUserController::class);
        Route::get('teams/{team:key}/settings', [TeamSettingsController::class, 'index']);
        Route::put('teams/{team:key}/settings', [TeamSettingsController::class, 'update']);
        Route::get('teams/{team:key}/info', TeamInfoController::class);

        Route::resource('teams.votes', VoteController::class)->scoped(['team' => 'key']);
        Route::group(['prefix' => 'teams/{team:key}/vote-types/power/'], function () {
            Route::get('check-vote', [VotePowerTypeActionsController::class, 'checkVote']);
            Route::get('check-store', [VotePowerTypeActionsController::class, 'checkStore']);
            Route::get('check-time', [VotePowerTypeActionsController::class, 'checkTime']);
        });

        Route::resource('teams.users', TeamUserController::class);

        //TODO: Review code
        Route::post('votes/{vote}/voted-users', [VotedUserController::class, 'store']);

        Route::post('teams/join', TeamJoinWithCodeController::class);

        Route::post('logout', [LogoutController::class, 'handle']);
    });
});


