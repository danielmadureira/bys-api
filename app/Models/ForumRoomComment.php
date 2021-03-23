<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ForumRoomComment
 *
 * @mixin Builder
 *
 * @package App\Models
 */
class ForumRoomComment extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $id = 'id';

    /**
     * Returns comment reactions.
     *
     * @return HasMany
     */
    public function forumRoomCommentReactions(): HasMany
    {
        return $this->hasMany(
            ForumRoomCommentReaction::class,
            'comment_id'
        );
    }

}
