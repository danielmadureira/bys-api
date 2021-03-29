<?php

namespace App\Http\Controllers;

use App\Models\FeedPost;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Class FeedPostController
 *
 * @package App\Http\Controllers
 */
class FeedPostController extends Controller
{

    /**
     * Creates a new feed post.
     *
     * @param Request $request
     *
     * @throws \Throwable
     */
    public function create(Request $request): void
    {
        /** @var User $user */
        $user = Auth::user();

        if (!$user->tokenCan('ADMIN')) {
            abort('401', __('auth.no_permission'));
        }

        $request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
            'headline' => 'nullable|string',
            'picture' => 'nullable|max:5120|mimes:jpg,jpeg,png,gif',
            'picture_description' => 'nullable|string'
        ]);

        $post = new FeedPost;
        $post->author = $user->getAttribute('id');
        $post->title = $request->input('title');
        $post->text = $request->input('text');
        $post->headline = $request->input('headline');
        $post->picture_description = $request->input('picture_description');

        if ($request->file('picture')) {
            $post->picture = $this->savePostPicture(
                $request->file('picture')
            );
        }

        if (!$post->save()) {
            abort(422, __('http.unprocessable_entity'));
        }
    }

    /**
     * Returns a post.
     *
     * @param int $postId
     *
     * @return FeedPost
     */
    public function getOne(int $postId): FeedPost
    {
        $post = FeedPost::find($postId);

        if (is_null($post)) {
            abort(404, __('http.not_found'));
        }

        return $post;
    }

    /**
     * Returns all feed posts.
     * The posts are returned without the text.
     *
     * @see self::getOne() For complete post data.
     *
     * @param Request $request
     *
     * @return Paginator
     */
    public function getAll(Request $request): Paginator
    {
        $request->validate([
            'per_page' => 'nullable|integer'
        ]);

        $perPage = min(
            (int) $request->query('per_page', 15),
            15
        );

        return FeedPost::get()
            ->makeHidden('text')
            ->toQuery()
            ->orderByDesc('id')
            ->paginate($perPage);
    }

    /**
     * Deletes a post.
     *
     * @param int $id
     *
     * @throws \Exception
     */
    public function delete(int $id): void
    {
        /** @var User $user */
        $user = Auth::user();

        if (!$user->tokenCan('ADMIN')) {
            abort('401', __('auth.no_permission'));
        }

        $post = FeedPost::find($id);

        if (is_null($post)) {
            abort(404, __('http.not_found'));
        }

        $post->delete();
    }

    /**
     * Saves post picture.
     *
     * @param UploadedFile $file
     *
     * @return string The name of the image.
     */
    private function savePostPicture(UploadedFile $file): string
    {
        $publicDisk = Storage::disk('public');

        $imagePath = $publicDisk->putFile(
            'post/pictures',
            $file
        );

        if ($imagePath === false) abort(422);

        return $imagePath;
    }

}
