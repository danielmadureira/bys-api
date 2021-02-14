<?php

namespace Database\Seeders;

use App\Models\ForumRoomCommentReaction;
use Illuminate\Database\Seeder;

/**
 * Class ForumRoomCommentReactionSeeder
 *
 * @package Database\Seeders
 */
class ForumRoomCommentReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ForumRoomCommentReaction::factory()
            ->count(1)
            ->create();
    }
}
