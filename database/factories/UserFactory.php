<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'username' => fake()->userName,
            'email' => fake()->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'validation_code' => fake()->randomNumber(6, true),
            'status' => rand(0,2),
            'validated_at' => fake()->unique()->dateTimeInInterval(
                '-53 days',
                '+ 1 days'),
            'role_id' => Role::query()->select('id')->inRandomOrder()->pluck('id')->first(),
            'created_at' => fake()->unique()->dateTimeInInterval(
                '-60 days',
                '+ 5 days'),
            'updated_at' => fake()->unique()->dateTimeInInterval(
                '-55 days',
                '+ 1 days'),
//            'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'validated_at' => null,
        ]);
    }
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 1,
        ]);
    }
    public function banned(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => -1,
        ]);
    }
}
