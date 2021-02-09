<?php

namespace Database\Factories;

use App\Models\UserDiary;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class UserDiaryFactory
 *
 * User diary database mock factory.
 *
 * @package Database\Factories
 */
class UserDiaryFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserDiary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 50),
            'title' => $this->faker->sentence,
            'text' => $this->faker->realText(100)
        ];
    }

}
