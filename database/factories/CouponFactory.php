<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Coupon>
 */
class CouponFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word,
            'code' => fake()->randomNumber(6, true),
            'amount' => fake()->randomNumber(3, false),
            'start_date' => fake()->dateTimeBetween('-2 month', '+4 week'),
            'expired_date' => fake()->dateTimeBetween('-1 week', '2 week'),
        ];
    }
}
