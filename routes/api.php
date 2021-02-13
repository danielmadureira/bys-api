<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedPostController;
use App\Http\Controllers\ForumGroupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDiaryController;
use App\Http\Controllers\UserMoodController;
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

/**
 * User routes.
 */
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
         * Updates user's image.
         */
        Route::post(
            "/user/image",
            [ UserController::class, 'updateImage' ]
        );

        /**
         * Creates a diary entry.
         */
        Route::post(
            "/user/diary",
            [ UserDiaryController::class, 'create' ]
        );

        /**
         * Updates an user.
         */
        Route::put(
            "/user/mood",
            [ UserMoodController::class, 'update' ]
        );

        /**
         * Returns all user's diary entries.
         */
        Route::get(
            "/user/diary",
            [ UserDiaryController::class, 'getAll' ]
        );

        /**
         * Returns a diary entry.
         */
        Route::get(
            "/user/diary/{id}",
            [  UserDiaryController::class, 'getOne' ]
        )->whereNumber('id');

        /**
         * Returns user's mood.
         */
        Route::get(
            "/user/mood/{id?}",
            [  UserMoodController::class, 'getOne' ]
        )->whereNumber('id');

        /**
         * Returns user's information.
         */
        Route::get(
            "/user/{id?}",
            [ UserController::class, 'getOne' ]
        )->whereNumber('id');

        /**
         * Creates a new post in the feed.
         */
        Route::post(
            "/feed/post",
            [ FeedPostController::class, 'create' ]
        );

        /**
         * Returns all posts.
         */
        Route::get(
            "/feed/post",
            [ FeedPostController::class, 'getAll' ]
        );

        /**
         * Returns a post's information.
         */
        Route::get(
            "/feed/post/{id}",
            [ FeedPostController::class, 'getOne' ]
        )->whereNumber('id');

        /**
         * Deletes a post.
         */
        Route::delete(
            "/feed/post/{id}",
            [ FeedPostController::class, 'delete' ]
        )->whereNumber('id');

        /**
         * Creates a new forum group.
         */
        Route::post(
            "/forum/group",
            [ ForumGroupController::class, 'create' ]
        );

        /**
         * Returns all forum groups.
         */
        Route::get(
            "/forum/group",
            [ ForumGroupController::class, 'getAll' ]
        );

    });
