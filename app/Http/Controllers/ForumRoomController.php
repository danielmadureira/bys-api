<?php

namespace App\Http\Controllers;

use App\Models\ForumRoom;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ForumRoomController
 *
 * @package App\Http\Controllers
 */
class ForumRoomController extends Controller
{

    /**
     * Creates a new forum room.
     *
     * @param Request $request
     *
     * @throws \Throwable
     */
    public function create(Request $request): void
    {
        $request->validate([
            'forum_group_id' => 'required|integer',
            'name' => 'required|string',
            'description' => 'nullable|string'
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $room = new ForumRoom;

        $room->created_by = $user->getAttribute('id');
        $room->forum_group_id = $request->forum_group_id;
        $room->name = $request->name;
        $room->description = $request->description;

        if (!$room->save()) {
            abort(422, __('http.unprocessable_entity'));
        }
    }

    /**
     * Returns a forum room.
     *
     * @param int $id
     *
     * @return ForumRoom
     */
    public function getOne(int $id): ForumRoom
    {
        $room = ForumRoom::find($id);

        if (is_null($room)) {
            abort(404, __('http.not_found'));
        }

        return $room;
    }

    /**
     * Returns all forum rooms.
     *
     * @param Request $request
     *
     * @return Paginator
     */
    public function getAll(Request $request): Paginator
    {
        $request->validate([
            'per_page' => 'nullable|integer',
            'forum_group_id' => 'nullable|integer'
        ]);

        $perPage = min(
            (int) $request->query('per_page', 15),
            15
        );

        $groupId = $request->query('forum_group_id');
        if (!is_null($groupId)) {
            return ForumRoom::where('forum_group_id', $groupId)
                ->simplePaginate($perPage);
        }

        return ForumRoom::simplePaginate($perPage);
    }

}
