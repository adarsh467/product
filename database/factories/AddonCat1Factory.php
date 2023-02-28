<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AddonCat1>
 */
class AddonCat1Factory extends Factory
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
            'product_id' => rand(1, 5),
            'name' => fake()->name(),
            'has_addon_cat' => fake()->boolean(),
            'status' => fake()->boolean(),
        ];
    }
}
