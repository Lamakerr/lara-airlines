<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Comment>
 */
class CommentFactory extends Factory
{
    public function definition(): array
    {
        $created_at = fake()->unique()->dateTimeInInterval(
            '-180 days',
            '+ 179 days');
        return [
            'name' => fake()->name,
            'text' => fake()->realText(200),
            'status' => rand(0,1),
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}
