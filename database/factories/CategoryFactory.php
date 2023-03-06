<?php

namespace Database\Factories;

use App\Models\Interest;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [//
            'title'       => $this->faker->sentence(1),
            'icon'        => $this->faker->randomElement(['la-home', 'la-pencil', 'la-globe', 'la-book-open', 'la-dumbbell']),
            'interest_id' => $this->faker->randomElement(Interest::all()->pluck('id')),
        ];
    }
}
