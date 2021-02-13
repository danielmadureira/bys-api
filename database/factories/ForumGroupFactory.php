<?php

namespace Database\Factories;

use App\Models\ForumGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class ForumGroupFactory
 *
 * @package Database\Factories
 */
class ForumGroupFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ForumGroup::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_by' => $this->faker->numberBetween(1, 50),
            'name' => $this->faker->sentence(),
            'description' => $this->faker->sentence
        ];
    }

}
