<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [//
            'text'      => $this->faker->sentence($this->faker->numberBetween(25, 50)),
            'answer_id' => $this->faker->randomElement(Answer::all()->pluck('id')),
            'user_id'   => $this->faker->randomElement(User::all()->pluck('id')),
        ];
    }
}
