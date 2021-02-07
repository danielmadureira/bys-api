<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 */
class UserController extends Controller
{

    /**
     * Creates a new user.
     *
     * @param Request $request
     *
     * @throws \Throwable
     */
    public function create(Request $request): void
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'profession' => 'nullable',
        ]);

        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->profession = $request->input('profession');

        $user->saveOrFail();
    }

    /**
     * Returns user's information.
     *
     * @param int $userId
     *
     * @return User
     */
    public function getOne(int $userId): User
    {
        $user = User::findOrFail($userId);

        return $user;
    }

    /**
     * Updates user's information.
     *
     * @param Request $request
     * @param int $id
     *
     * @throws \Throwable
     */
    public function update(Request $request): void
    {
        /** @var User $user */
        $user = Auth::user();

        $user->name = $request->input('name', $user->name);
        $user->email = $request->input('email', $user->email);
        $user->profession = $request->input('profession', $user->profession);

        $user->saveOrFail();
    }

    /**
     * Updates user's image.
     *
     * @param Request $request
     * @param int $userId
     *
     * @throws \Throwable
     */
    public function updateImage(Request $request): void
    {
        $request->validate([
            'image' => 'required|max:5120|mimes:jpg,jpeg,png,gif'
        ]);

        $publicDisk = Storage::disk('public');
        $imagePath = $publicDisk->putFile(
            'avatars',
            $request->file('image')
        );

        if ($imagePath === false) abort(422);

        /** @var User $user */
        $user = Auth::user();
        $oldImage = $user->profile_picture;
        $user->profile_picture = $imagePath;

        try {
            $user->saveOrFail();

            if (!is_null($oldImage)) {
                $publicDisk->delete($oldImage);
            }

        } catch (\Exception $exception) {
            $publicDisk->delete($imagePath);

            throw $exception;
        }
    }

}
