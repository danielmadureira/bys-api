<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ForumRoom
 *
 * @mixin Builder
 *
 * @package App\Models
 */
class ForumRoom extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $id = 'id';

    /**
     * Returns the room's group.
     *
     * @return BelongsTo
     */
    public function forumGroup(): BelongsTo
    {
        return $this->belongsTo(ForumGroup::class);
    }

}
