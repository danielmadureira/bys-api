<?php

namespace Database\Seeders;

use App\Models\FeedPost;
use Illuminate\Database\Seeder;

/**
 * Class FeedPostSeeder
 *
 * @package Database\Seeders
 */
class FeedPostSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FeedPost::factory()
            ->count(35)
            ->create();
    }

}
