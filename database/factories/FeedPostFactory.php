<?php

namespace Database\Factories;

use App\Models\FeedPost;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class FeedPostFactory
 *
 * @package Database\Factories
 */
class FeedPostFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FeedPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $profilePicture = sprintf(
            "%s.%s",
            $this->faker->sha1,
            $this->faker->randomElement([ 'jpg', 'jpeg', 'png', 'gif' ])
        );

        return [
            'author' => $this->faker->numberBetween(40, 50),
            'picture' => $profilePicture,
            'picture_description' => $this->faker->sentence,
            'title' => $this->faker->sentence,
            'headline' => $this->faker->realText(100),
            'text' => $this->faker->realText(100)
        ];
    }

}
