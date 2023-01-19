<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'path'      => Storage::disk('public')->putFile('/', new File($this->faker->image(null, 640, 480, 'business'))),
            'size'      => $this->faker->numberBetween(10, 100),
            'name'      => $this->faker->sentence(2),
            'extension' => $this->faker->fileExtension(),
            'hash'      => $this->faker->sha1(),
            'type'      => 'file',
        ];
    }
}
