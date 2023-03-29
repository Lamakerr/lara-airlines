<?php

namespace Database\Factories;

use App\Models\Airport;
use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Route>
 */
class RouteFactory extends Factory
{
    public function definition(): array
    {
        $from = Airport::query()
            ->select('id')
            ->inRandomOrder()
            ->pluck('id')
            ->first();
        $to = Airport::query()
            ->select('id')
            ->whereNot('id', $from)
            ->inRandomOrder()
            ->pluck('id')
            ->first();
        return [
            'airport_from' => $from,
            'airport_to' => $to,
        ];
    }
}
