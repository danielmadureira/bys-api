<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ForumRoomCommentReaction
 *
 * @mixin Builder
 *
 * @package App\Models
 */
class ForumRoomCommentReaction extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Returns the composite primary key.
     *
     * @param $value
     *
     * @return array
     */
    public function getIdAttribute($value): array
    {
        return [ $this->comment_id, $this->user_id ];
    }

}
