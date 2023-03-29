<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Document;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends Factory<Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $created_at = fake()->unique()->dateTimeInInterval(
            '-180 days',
            '+ 179 days');
        $path = public_path('images/contacts');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        return [
            'user_id' => User::factory(),
            'surname' => fake()->unique()->firstName,
            'patronymic' => fake()->middleName,
            'last_name' => fake()->unique()->lastName,
            'comment'   => fake()->unique()->text(100),
            'photo'     => fake()->words(5, true),
//            'photo'     => fake()->image($path, 120, 90, null, false),
            'document_id' => Document::query()->select('id')->inRandomOrder()->pluck('id')->first(),
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}
