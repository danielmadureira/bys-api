<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * @mixin Builder
 *
 * @package App\Models
 */
class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $id = 'id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Returns user image link.
     *
     * @see https://laravel.com/docs/8.x/eloquent-mutators#accessors-and-mutators
     *
     * @param string|null $profilePicture
     *
     * @return string|null
     */
    public function getProfilePictureAttribute(?string $profilePicture): ?string
    {
        if (is_null($profilePicture)) {
            return null;
        }

        return asset("storage/{$profilePicture}");
    }

    /**
     * Returns user's diary entries.
     *
     * @return HasMany
     */
    public function diaryEntries(): HasMany
    {
        return $this->hasMany(UserDiary::class);
    }

    /**
     * Returns user's mood.
     *
     * @return HasOne
     */
    public function mood(): HasOne
    {
        return $this->hasOne(UserMood::class);
    }

    /**
     * Returns feed posts the user created.
     *
     * @return HasMany
     */
    public function feedPosts(): HasMany
    {
        return $this->hasMany(FeedPost::class, 'author');
    }

}
