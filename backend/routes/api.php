<?php

use App\Http\Controllers\API\Auth\RegisterController;
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

//versiyon ??

Route::post('register', [RegisterController::class, 'handle']);

Route::get('test', function () {
    return 'ok';
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
