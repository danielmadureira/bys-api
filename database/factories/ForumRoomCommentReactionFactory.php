<?php

namespace Database\Factories;

use App\Models\ForumRoomCommentReaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class ForumRoomCommentReactionFactory
 *
 * @package Database\Factories
 */
class ForumRoomCommentReactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ForumRoomCommentReaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment_id' => $this->faker->numberBetween(1, 150),
            'user_id' => $this->faker->numberBetween(1, 50)
        ];
    }
}
