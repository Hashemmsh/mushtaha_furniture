<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->words(6 , true),
            'image' => fake()->imageUrl(),
            'content' =>fake()->paragraph(4,true),
            'price' =>fake()->numberBetween(100 , 1000),
            'user_id' =>fake()->numberBetween(1 , 10),
            'category_id' =>fake()->numberBetween(1 , 40),

        ];
    }
}
