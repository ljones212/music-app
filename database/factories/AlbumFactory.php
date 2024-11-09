<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Certification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'duration' => fake()->numberBetween(20, 200),
            'release_date' => fake()->date(),
            //Creates a certification.
            'certification_id' => Certification::factory(),
        ];
    }
}
