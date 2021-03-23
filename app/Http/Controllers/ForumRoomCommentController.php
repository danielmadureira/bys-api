<?php

namespace App\Http\Controllers;

use App\Models\ForumRoomComment;
use App\Models\ForumRoomCommentReaction;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ForumRoomCommentController
 *
 * @package App\Http\Controllers
 */
class ForumRoomCommentController extends Controller
{

    /**
     * Creates a new forum room comment.
     *
     * @param Request $request
     *
     * @throws \Throwable
     */
    public function create(Request $request): void
    {
        $request->validate([
            'text' => 'required|string'
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $comment = new ForumRoomComment;

        $comment->created_by = $user->getAttribute('id');
        $comment->forum_room_id = $request->forum_room_id;
        $comment->text = $request->text;

        if (!$comment->save()) {
            abort(422, __('http.unprocessable_entity'));
        }
    }

    /**
     * Returns all forum room comments.
     *
     * @param Request $request
     *
     * @return Paginator
     */
    public function getAll(Request $request): Paginator
    {
        $request->validate([
            'forum_room_id' => 'nullable|integer',
            'per_page' => 'nullable|integer'
        ]);

        $perPage = min(
            (int) $request->query('per_page', 15),
            15
        );

        $forumRoomId = $request->query('forum_room_id');
        $whereClause = [];
        if (!is_null($forumRoomId)) {
            $whereClause[0] = [ 'forum_room_id', $forumRoomId ];
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        return ForumRoomComment::addSelect([
            "user_reacted" => ForumRoomCommentReaction::selectRaw("COUNT(*)")
                ->whereColumn("comment_id", "forum_room_comments.id")
                ->where("user_id", $user->getAttribute('id')),
            "total_reactions" => ForumRoomCommentReaction::selectRaw("COUNT(*)")
                ->whereColumn("comment_id", "forum_room_comments.id")
        ])
            ->where($whereClause)
            ->simplePaginate($perPage);
    }

}
