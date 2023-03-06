<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\File;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use phpseclib3\Crypt\Random;
use Ramsey\Uuid\Type\Integer;

class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'question_number' => $this->faker->randomNumber(2, 60),
            'category_id' => $this->faker->randomElement(Category::all()->pluck('id')),
            'final_mark' => $this->faker->numberBetween(0, 100),
            'passed' => $this->faker->randomElement([true, false]),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {

    }
}
