<?php

namespace Database\Seeders;

use App\Models\UserMood;
use Illuminate\Database\Seeder;

/**
 * Class UserMoodSeeder
 *
 * @package Database\Seeders
 */
class UserMoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserMood::factory()
            ->count(49)
            ->create();
    }

}
