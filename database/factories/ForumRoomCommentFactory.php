<?php

namespace Database\Factories;

use App\Models\ForumRoomComment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class ForumRoomCommentFactory
 *
 * @package Database\Factories
 */
class ForumRoomCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ForumRoomComment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_by' => $this->faker->numberBetween(1, 50),
            'forum_room_id' => $this->faker->numberBetween(1, 16),
            'text' => $this->faker->text()
        ];
    }

}
