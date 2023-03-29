<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);
        $created_at = fake()->unique()->dateTimeInInterval(
            '-180 days',
            '+ 179 days');
        return [
            'name' => $name,
            'slug' => Str::slug($name, '-'),
            'description' => fake()->paragraph,
            'price' => fake()->randomFloat(1, 1000, 100000),
            'route_id' => Route::query()->select('id')->inRandomOrder()->pluck('id')->first(),
            'status' => rand(0,1),
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}
