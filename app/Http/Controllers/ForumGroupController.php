<?php

namespace App\Http\Controllers;

use App\Models\ForumGroup;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

/**
 * Class ForumGroupController
 *
 * @package App\Http\Controllers
 */
class ForumGroupController extends Controller
{

    /**
     * Creates a new forum group.
     *
     * @param Request $request
     *
     * @throws Throwable
     */
    public function create(Request $request): void
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string'
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $group = new ForumGroup;

        $group->created_by = $user->getAttribute('id');
        $group->name = $request->input('name');
        $group->description = $request->input('description');

        $group->saveOrFail();
    }

    /**
     * Returns all forum groups.
     *
     * @param Request $request
     *
     * @return Paginator
     */
    public function getAll(Request $request): Paginator
    {
        $request->validate([
            'per_page' => "nullable|integer"
        ]);

        $perPage = min(
            (int) $request->query('per_page', 15),
            15
        );

        return ForumGroup::simplePaginate($perPage);
    }

}
