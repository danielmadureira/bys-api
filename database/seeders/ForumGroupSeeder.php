<?php

namespace Database\Seeders;

use App\Models\ForumGroup;
use Illuminate\Database\Seeder;

/**
 * Class ForumGroupSeeder
 *
 * @package Database\Seeders
 */
class ForumGroupSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ForumGroup::factory()
            ->count(10)
            ->create();
    }

}
