<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [//
            'text'        => $this->faker->sentence($this->faker->numberBetween(25, 50)),
            'votes'       => $this->faker->numberBetween(-10, 25),
            'accepted'    => $this->faker->boolean(),
            'user_id'     => $this->faker->randomElement(User::all()->pluck('id')),
            'question_id' => $this->faker->randomElement(Question::all()->pluck('id')),
        ];
    }
}
