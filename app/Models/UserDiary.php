<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserDiary
 *
 * User's diary.
 *
 * @mixin Builder
 *
 * @package App\Models
 */
class UserDiary extends Model
{

    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $id = 'id';

}
