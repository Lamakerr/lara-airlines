<?php

namespace Database\Factories;

use App\Models\Gender;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Gender>
 */
class GenderFactory extends Factory
{
    public function definition(): array
    {
        $genders = [
            'male',
            'female',
            'idk'
        ];
        $gender = fake()->unique()->randomElement($genders);
        return [
            'name' => $gender,
            'slug' => Str::slug($gender, '-'),
        ];
    }
}
