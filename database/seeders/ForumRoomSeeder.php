<?php

namespace Database\Seeders;

use App\Models\ForumRoom;
use Illuminate\Database\Seeder;

/**
 * Class ForumRoomSeeder
 *
 * @package Database\Seeders
 */
class ForumRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ForumRoom::factory()
            ->count(15)
            ->create();
    }
}
