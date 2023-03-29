<?php

namespace Database\Factories;

use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Gender;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Document>
 */
class DocumentFactory extends Factory
{
    public function definition(): array
    {
        $created_at = fake()->unique()->dateTimeInInterval(
            '-180 days',
            '+ 179 days');
        return [
            'name' => fake()->word,
            'document_type_id' => DocumentType::query()->select('id')->inRandomOrder()->pluck('id')->first(),
            'series' => Str::random(6),
            'number' => Str::random(6),
            'gender_id' => Gender::query()->select('id')->inRandomOrder()->pluck('id')->first(),
            'birthday' => fake()->unique()->dateTimeInInterval(
                '-100 years',
                '+ 99 years'),
            'birthplace' => fake()->country(),
            'issue_date' => fake()->unique()->dateTimeInInterval(
                '-5 years',
                '+ 1 years'),
            'expired_date' => fake()->unique()->dateTimeInInterval(
                '-6 month',
                '+ 2 years'),
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}
