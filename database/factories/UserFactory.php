<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

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
            'name' => $this->faker->name,
            'profession' => $this->faker->jobTitle,
            'profile_picture' => $profilePicture,
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$Y.6cUP9k1AzFXjYzNxuZ/OyZmp2Hn.jLnRCUgdNW84VN.xEPZeJs.',
            'remember_token' => Str::random(10),
        ];
    }
}
