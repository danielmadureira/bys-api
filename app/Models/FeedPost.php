<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FeedPost
 *
 * @mixin Builder
 *
 * @package App\Models
 */
class FeedPost extends Model
{

    use HasFactory, SoftDeletes;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $id = 'id';

    /**
     * Returns the post picture link.
     *
     * @param string|null $picture
     *
     * @return string|null
     */
    public function getPictureAttribute(?string $picture = null): ?string
    {
        if (is_null($picture)) {
            return null;
        }

        return asset("storage/{$picture}");
    }

    /**
     * Returns the post headline.
     *
     * @param string|null $headline
     *
     * @return string
     */
    public function getHeadlineAttribute(?string $headline = null): string
    {
        if (is_null($headline) || !isset($headline)) {
            return substr(strip_tags($this->text), 0, 100);
        }

        return $headline;
    }

}
