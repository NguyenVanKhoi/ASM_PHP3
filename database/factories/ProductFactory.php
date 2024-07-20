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
    public function definition(): array
    {
        return [
            'product_name' => fake()->name(),
            'image' => '',
            'price' => fake()->numberBetween(200000, 1000000),
            'description' => fake()->text(150),
            'quantity' => fake()->numberBetween(1, 100),
            'size_id' => fake()->numberBetween(1, 5),
            'color_id' => fake()->numberBetween(1, 4),
            'category_id' => fake()->numberBetween(1, 4),
        ];
    }
}
