<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [//
            'title'       => $this->faker->sentence($this->faker->numberBetween(5, 15)),
            'details'     => $this->faker->sentence($this->faker->numberBetween(25, 60)),
            'votes'       => $this->faker->numberBetween(-10, 25),
            'views'       => $this->faker->numberBetween(0, 100),
            'closed'      => false,
            'category_id' => $this->faker->randomElement(Category::all()->pluck('id')),
            'user_id'     => $this->faker->randomElement(User::all()->pluck('id')),
        ];
    }
}
