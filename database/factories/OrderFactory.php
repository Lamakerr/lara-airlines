<?php

namespace Database\Factories;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    public function definition(): array
    {
        $created_at = fake()->unique()->dateTimeInInterval(
            '-180 days',
            '+ 179 days');
        return [
            'user_id' => User::query()->select('id')->inRandomOrder()->pluck('id')->first(),
            'product_id' => Product::query()->select('id')->inRandomOrder()->pluck('id')->first(),
            'amount' => fake()->randomFloat(2, 1000, 10000),
            'status' => rand(0,1),
            'coupon_enabled' => rand(0,1),
            'coupon_id' => Coupon::query()->select('id')->inRandomOrder()->pluck('id')->first(),
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}
