<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(2,true),
            'description' => $this->faker->text(100),
            'image_primary' => $this->faker->imageUrl(360, 360, 'animals', true, 'cats'),
        ];
    }
}
