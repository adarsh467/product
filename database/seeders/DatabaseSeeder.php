<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Admin::factory(10)->create();
        \App\Models\Product::factory(50)->has(\App\Models\AddonCat1::factory()->count(3))->create();
        // \App\Models\AddonCat1::factory()->has(\App\Models\AddonCat2::factory()->count(10))->create();
        \App\Models\AddonCat2::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
