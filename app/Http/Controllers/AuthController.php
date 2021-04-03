<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
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
     * @return JsonResponse
     *
     * @throws ValidationException
     */
    public function authenticate(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'nullable'
        ]);

        $user = User::where('email', $request->email)->first();

        if (
            !$user
            || !Hash::check($request->password, $user->password)
            || !$this->isWhitelisted($user)
        ) {
            abort('401', __('auth.failed'));
        }

        $plainTextToken = $user
            ->createToken(
                $request->input('device_name', microtime()),
                [ $user->user_type ]
            )
            ->plainTextToken;

        return response()->json([ 'token' => $plainTextToken ]);
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

    /**
     * Checks if a user is whitelisted.
     *
     * @param User $user
     *
     * @return bool
     */
    private function isWhitelisted(User $user): bool
    {
        if ($user->getAttribute('id') === 1) {
            return true;
        }

        $whitelist = [
            'ebseh.gov.br'
        ];

        $userEmailDomain = last(explode('@', $user->email));
        $userIsWhitelisted = in_array($userEmailDomain, $whitelist);

        if ($userIsWhitelisted) {
            return true;
        }

        return false;
    }

}
