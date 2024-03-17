<?php

namespace Database\Factories\Researches;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Researches\Research>
 */
class ResearchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->userName,
            "researcher" => fake()->userName,
            "number_of_pages" => rand(30, 200),
            "date" => fake()->date,
            "file" => fake()->userName,
            "views" => rand(0, 1000),
        ];
    }
}
