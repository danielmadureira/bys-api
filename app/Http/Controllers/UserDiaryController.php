<?php

namespace App\Http\Controllers;

use App\Models\UserDiary;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserDiaryController
 *
 * User's diary controller.
 *
 * @package App\Http\Controllers
 */
class UserDiaryController extends Controller
{

    /**
     * Creates a new diary entry.
     *
     * @param Request $request
     *
     * @throws \Throwable
     */
    public function create(Request $request): void
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $diaryEntry = new UserDiary;

        $diaryEntry->user_id = $user->getAttribute('id');
        $diaryEntry->title = $request->input('title');
        $diaryEntry->text = $request->input('text');

        if (!$diaryEntry->save()) {
            abort(422, __('http.unprocessable_entity'));
        }
    }

    /**
     * Returns one of user's diary entries.
     *
     * @param int $id
     *
     * @return UserDiary
     */
    public function getOne(int $id): UserDiary
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        /** @var UserDiary $diaryEntry */
        $diaryEntry = $user->diaryEntries()
            ->where('id', $id)
            ->first();

        if (is_null($diaryEntry)) {
            abort(404, __('http.not_found'));
        }

        return $diaryEntry;
    }

    /**
     * Returns user's diary entries.
     *
     * @return Paginator
     */
    public function getAll(Request $request): Paginator
    {
        $request->validate([
            'per_page' => 'integer|nullable'
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $perPage = min(
            (int) $request->query('per_page', 15),
            15
        );

        return $user
            ->diaryEntries()
            ->orderByDesc('id')
            ->paginate($perPage);
    }

}
