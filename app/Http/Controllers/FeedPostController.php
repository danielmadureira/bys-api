<?php

namespace App\Http\Controllers;

use App\Models\FeedPost;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
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
        $request->validate([
            'author' => 'required|integer',
            'picture' => 'nullable|max:5120|mimes:jpg,jpeg,png,gif',
            'picture_description' => 'nullable|string',
            'title' => 'required|string',
            'headline' => 'nullable|string',
            'text' => 'required|string'
        ]);

        /** @var User $user */
        $user = Auth::user();

        $pictureName = $this->savePostPicture(
            $request->file('picture')
        );

        $post = new FeedPost;

        $post->author = $user->getAttribute('id');
        $post->picture = $pictureName;
        $post->picture_description = $request->input('picture_description');
        $post->title = $request->input('title');
        $post->headline = $request->input('headline');
        $post->text = $request->input('text');

        $post->saveOrFail();
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
        return FeedPost::find($postId);
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

        /** @var string[] $columns */
        /** @noinspection PhpUndefinedMethodInspection */
        $columns = Schema::getColumnListing(
            (new FeedPost)->getTable()
        );

        return FeedPost::simplePaginate(
            $perPage,
            array_diff($columns, [ 'text' ])
        );
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
        FeedPost::findOrFail($id)->delete();
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
