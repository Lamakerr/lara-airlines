<?php

namespace Database\Factories;

use App\Models\DocumentType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DocumentType>
 */
class DocumentTypeFactory extends Factory
{
    public function definition(): array
    {
        $documentTypes = [
            'Паспорт',
            'Свидетельство о рождении',
            'Заграничный паспорт',
        ];
        return [
            'name' => fake()->unique()->randomElement($documentTypes),
        ];
    }
}
