<?php

use App\Http\Controllers\UserController;
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

Route::group([ 'middleware' => [ 'api' ] ], function () {
    Route::put(
        "/user/{id}",
        [ UserController::class, 'update' ]
    );

    Route::get(
        "/user/{id}",
        [ UserController::class, 'getOne' ]
    );

    Route::post(
        "/user",
        [ UserController::class, 'create' ]
    );

    Route::post(
        "/user/{id}/image",
        [ UserController::class, 'updateImage' ]
    );
});
