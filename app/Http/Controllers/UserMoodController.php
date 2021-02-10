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

        $userMood->saveOrFail();
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
            $user = User::findOrFail($id);
        }

        /** @var UserMood $userMood */
        $userMood = $user->mood;

        return $userMood;
    }

}
