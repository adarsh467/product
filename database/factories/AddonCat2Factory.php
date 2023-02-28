<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AddonCat2>
 */
class AddonCat2Factory extends Factory
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
            'addon_cat_1_id' => rand(1, 5),
            'name' => fake()->name(),
            'price' => rand(1, 100000),
            'status' => fake()->boolean(),
        ];
    }
}
