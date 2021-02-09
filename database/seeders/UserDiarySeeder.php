<?php

namespace Database\Seeders;

use App\Models\UserDiary;
use Illuminate\Database\Seeder;

/**
 * Class UserDiarySeeder
 *
 * User diary database mock seeder.
 *
 * @package Database\Seeders
 */
class UserDiarySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserDiary::factory()
            ->count(500)
            ->create();
    }

}
