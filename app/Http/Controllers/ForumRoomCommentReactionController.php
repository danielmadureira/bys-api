<?php

namespace App\Http\Controllers;

use App\Models\ForumRoomCommentReaction;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ForumRoomCommentReactionController
 *
 * @package App\Http\Controllers
 */
class ForumRoomCommentReactionController extends Controller
{

    /**
     * Creates a new comment reaction.
     *
     * @param Request $request
     *
     * @throws \Throwable
     */
    public function create(Request $request): void
    {
        $request->validate([
            'forum_room_comment_id' => 'required|integer'
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $reaction = new ForumRoomCommentReaction;

        $reaction->user_id = $user->getAttribute('id');
        $reaction->comment_id = $request->forum_room_comment_id;

        if (!$reaction->save()) {
            abort(422, __('http.unprocessable_entity'));
        }
    }

    /**
     * Returns all comment reactions.
     *
     * @param Request $request
     *
     * @return Paginator
     */
    public function getAll(Request $request): Paginator
    {
        $request->validate([
            'forum_room_comment_id' => 'nullable|integer',
            'per_page' => 'nullable|integer'
        ]);

        $perPage = min(
            (int) $request->query('per_page', 15),
            15
        );

        $commentId = $request->query('forum_room_comment_id');
        if (!is_null($commentId)) {
            return ForumRoomCommentReaction::where('comment_id', $commentId)
                ->paginate($perPage);
        }

        return ForumRoomCommentReaction::paginate($perPage);
    }

    /**
     * Deletes a comment reaction.
     *
     * @param Request $request
     *
     * @throws \Exception
     */
    public function delete(Request $request): void
    {
        $request->validate([
            'forum_room_comment_id' => 'required|integer'
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        ForumRoomCommentReaction::where([
            'comment_id' => $request->query('forum_room_comment_id'),
            'user_id' => $user->getAttribute('id')
        ])->delete();
    }

}
