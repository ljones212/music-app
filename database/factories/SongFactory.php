<?php

namespace Database\Factories;

use App\Model\Certification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence($nbWords = 2, $variableNbWords = true),
            'duration' => fake()->numberBetween(1, 12),
            //Creates a certification.
            'certification_id' => Certification::factory(),
        ];
    }
}
