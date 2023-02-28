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
            'admin_id' => rand(1, 2),
            'name' => fake()->name(),
            'price' => rand(1, 100000),
            // 'image' => fake()->unique()->imageUrl($width=50, $height=30),
            // 'image' => 'default.jpg',
            // 'img_path' => fake()->unique()->url(),
            // 'img_path' => 'assets/dist/img/',
            'has_addon_cat' => fake()->boolean(),
            'status' => fake()->boolean(),
        ];
    }
}
