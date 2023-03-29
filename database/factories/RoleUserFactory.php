<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RoleUser>
 */
class RoleUserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'role_id' => Role::query()->select('id')->inRandomOrder()->pluck('id')->first(),
            'user_id' => User::query()->select('id')->inRandomOrder()->pluck('id')->first(),
        ];
    }
}
