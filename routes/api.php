<?php

use App\Http\Controllers\AuthController;
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

Route::middleware(['api'])->group(function () {

    /**
     * Log in.
     */
    Route::post(
        "/",
        [ AuthController::class, 'authenticate' ]
    );

    /**
     * Creates new user.
     */
    Route::post(
        "/user",
        [ UserController::class, 'create' ]
    );

});

Route::middleware(['api'])
    ->middleware('auth:sanctum')
    ->group(function () {

    /**
     * Log out.
     */
    Route::post(
        "/logout",
        [ AuthController::class, "unauthenticate" ]
    );

    /**
     * Updates an user.
     */
    Route::put(
        "/user",
        [ UserController::class, 'update' ]
    );

    /**
     * Returns user's information.
     */
    Route::get(
        "/user/{id}",
        [ UserController::class, 'getOne' ]
    );

    /**
     * Updates user's image.
     */
    Route::post(
        "/user/image",
        [ UserController::class, 'updateImage' ]
    );

});
