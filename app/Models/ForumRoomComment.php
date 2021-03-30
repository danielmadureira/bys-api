<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
     * Returns the creator of the room.
     *
     * @return BelongsTo
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Returns the comment's room.
     *
     * @return BelongsTo
     */
    public function forumRoom(): BelongsTo
    {
        return $this->belongsTo(ForumRoom::class);
    }

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
