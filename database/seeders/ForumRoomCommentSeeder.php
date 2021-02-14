<?php

namespace Database\Seeders;

use App\Models\ForumRoomComment;
use Illuminate\Database\Seeder;

/**
 * Class ForumRoomCommentSeeder
 *
 * @package Database\Seeders
 */
class ForumRoomCommentSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ForumRoomComment::factory()
            ->count(150)
            ->create();
    }

}
