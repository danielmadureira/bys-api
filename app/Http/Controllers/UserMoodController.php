<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserMood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserMoodController
 *
 * @package App\Http\Controllers
 */
class UserMoodController extends Controller
{

    /**
     * Updates user's mood.
     *
     * @param Request $request
     *
     * @throws \Throwable
     */
    public function update(Request $request): void
    {
        $request->validate([
            'emoji_hex' => "required|string",
            'description' => "required|string"
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        /** @var \App\Models\UserMood $userMood */
        $userMood = $user->mood;

        $userMood->emoji_hex = $request->emoji_hex;
        $userMood->description = $request->description;

        if (!$userMood->save()) {
            abort(422, __('http.unprocessable_entity'));
        }
    }

    /**
     * Returns user's mood.
     *
     * @param int|null $id Leave blank for own mood.
     *
     * @return UserMood
     */
    public function getOne(?int $id = null): UserMood
    {
        if (is_null($id)) {
            /** @var \App\Models\User $user */
            $user = Auth::user();
        } else {
            $user = $this->findUser($id);
        }

        /** @var UserMood $userMood */
        $userMood = $user->mood;

        return $userMood;
    }

    /**
     * Finds an user or returns an 404
     * HTTP response.
     *
     * @param int $userId
     *
     * @return User
     */
    private function findUser(int $userId): User
    {
        $user = User::find($userId);

        if (is_null($user)) {
            abort(404, __('http.not_found'));
        }

        return $user;
    }

}
