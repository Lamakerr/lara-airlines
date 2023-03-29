<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\CommentUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CommentUser>
 */
class CommentUserFactory extends Factory
{
    public function definition(): array
    {
        $comments_ids = Comment::query()->select('id')->pluck('id')->toArray();

        return [
            'user_id' => User::query()->select('id')->inRandomOrder()->pluck('id')->first(),
            'comment_id' => fake()->unique()->randomElement($comments_ids),
//                Comment::query()
//                ->select('id')
//                ->whereNotIn('id', $comments_ids)
//                ->pluck('id')
//                ->unique('id')
//                ->first(),
        ];
    }
}
