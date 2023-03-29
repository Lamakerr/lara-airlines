<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Role>
 */
class RoleFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->jobTitle();
        $jobTitles = [
            'User',
            'Call manager',
            'Office manager',
            'Seo dep',
            'Administrator',
            'Root admin',
        ];

        return [
            'name' => fake()->unique()->randomElement($array = $jobTitles),
            'status' => 1, //rand(0,1),
        ];
    }
}
