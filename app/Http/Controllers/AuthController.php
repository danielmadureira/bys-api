<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * Class AuthController
 *
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{

    /**
     * Logs user in.
     *
     * @param Request $request
     *
     * @return string
     *
     * @throws ValidationException
     */
    public function authenticate(Request $request): string
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'nullable'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                __('auth.failed')
            ]);
        }

        return $user
            ->createToken($request->input('device_name', microtime()))
            ->toJson();
    }

    /**
     * Logs user out.
     */
    public function unauthenticate(): void
    {
        /** @var User $user */
        $user = Auth::user();

        /** @var PersonalAccessToken $token */
        $token = $user->currentAccessToken();

        $user
            ->tokens()
            ->where('id', $token->id)
            ->delete();
    }

}
