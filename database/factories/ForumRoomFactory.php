<?php

namespace Database\Factories;

use App\Models\ForumRoom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class ForumRoomFactory
 *
 * @package Database\Factories
 */
class ForumRoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ForumRoom::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_by' => $this->faker->numberBetween(1, 50),
            'forum_group_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->sentence,
            'description' => $this->faker->sentence
        ];
    }
}
