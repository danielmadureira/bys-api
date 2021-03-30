<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserMood;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    public static $SUPER_USER_ID = 1;

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
            'image' => 'nullable|max:5120|mimes:jpg,jpeg,png,gif',
        ]);

        $userAlreadyExists = User::where('email', $request->email)->exists();
        if ($userAlreadyExists) {
            $mensagem = "Já existe um usuário cadastrado com este endereço de email";
            abort(409, $mensagem);
        }

        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->profession = $request->input('profession');

        if (!is_null($request->file('image'))) {
            $publicDisk = Storage::disk('public');
            $imagePath = $publicDisk->putFile(
                'avatars',
                $request->file('image')
            );
            if ($imagePath === false) {
                abort(422, __('http.unprocessable_entity'));
            }
            $user->profile_picture = $imagePath;
        }

        if (!$user->save()) {
            abort(422, __('http.unprocessable_entity'));
        }

        $this->createUserMood($user->getAttribute('id'));
    }

    /**
     * Returns user's information.
     *
     * @param int $userId
     *
     * @return User
     */
    public function getOne(?int $userId = null): User
    {
        if (is_null($userId)) {
            /** @var User $user */
            $user = Auth::user();
        } else {
            $user = $this->findUser($userId);
        }

        return $user;
    }

    /**
     * Returns all users.
     *
     * @param Request $request
     *
     * @return Paginator
     */
    public function getAll(Request $request): Paginator
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        if (!$user->tokenCan('ADMIN')) {
            abort(401, __('auth.no_permission'));
        }

        $request->validate([
            'per_page' => "nullable|integer"
        ]);

        $perPage = min(
            (int) $request->query('per_page', 15),
            15
        );

        return User::orderByDesc('id')
            ->paginate($perPage);
    }

    /**
     * Updates an user's administrator privileges.
     *
     * @param int $userId
     */
    public function updatePrivileges(int $userId): void
    {
        /** @var \App\Models\User $requestUser */
        $requestUser = Auth::user();
        if (!$requestUser->tokenCan('ADMIN')) {
            abort(401, __('auth.no_permission'));
        }

        /*
         * Can't change super-user's or your
         * own administrator privileges.
         */
        if (
            $userId === self::$SUPER_USER_ID
            || $userId === $requestUser->getAttribute('id')
        ) {
            abort(422, __('http.unprocessable_entity'));
        }

        $user = User::find($userId);

        if ($user->user_type === "ADMIN") {
            $user->user_type = "REGULAR";
        } else {
            $user->user_type = "ADMIN";
        }

        if (!$user->save()) {
            abort(422, __('http.unprocessable_entity'));
        }
    }

    /**
     * Deletes a user.
     *
     * @param int $userId
     *
     * @throws \Exception
     */
    public function delete(int $userId): void
    {
        /** @var \App\Models\User $requestUser */
        $requestUser = Auth::user();

        if (!$requestUser->tokenCan('ADMIN')) {
            abort(401, __('auth.no_permission'));
        }

        /*
         * Can't delete super-user's or your
         * own user.
         */
        if (
            $userId === self::$SUPER_USER_ID
            || $userId === $requestUser->getAttribute('id')
        ) {
            abort(422, __('http.unprocessable_entity'));
        }

        $user = User::find($userId);
        if (is_null($user)) {
            abort(404, __('http.not_found'));
        }

        $user->delete();
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

        if (!$user->save()) {
            abort(422, __('http.unprocessable_entity'));
        }
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

        if ($imagePath === false) {
            abort(422, __('http.unprocessable_entity'));
        }

        /** @var User $user */
        $user = Auth::user();
        $oldImage = $user->profile_picture;
        $user->profile_picture = $imagePath;

        try {
            if (!$user->save()) {
                abort(422, __('http.unprocessable_entity'));
            }

            if (!is_null($oldImage)) {
                $publicDisk->delete($oldImage);
            }

        } catch (\Exception $exception) {
            $publicDisk->delete($imagePath);

            throw $exception;
        }
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

    /**
     * Creates a new user's mood.
     *
     * @param int $userId
     */
    private function createUserMood(int $userId): void
    {
        $userMood = new UserMood;
        $userMood->user_id = $userId;
        $userMood->emoji_hex = 128512;
        $userMood->description = 'Me sentindo incrível!';

        $userMood->save();
    }

}
