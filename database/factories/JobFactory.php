<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        for ($i = 10000; $i < 1000001; $i += 5000) {
            $salaries[] = $i;
        }

        return [
            'title' => fake()->jobTitle,
            'salary' => fake()->randomElement($salaries),
            'location' => fake()->country(),
            'url' => fake()->url,
            'schedule' => fake()->randomElement(['Part time', 'Full time']),
            'employer_id' => Employer::factory(),
            'featured' => fake()->randomElement([true, false]),
        ];
    }
}
