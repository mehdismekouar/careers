<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Exception;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $maxRetries = 100;
        $retries = 0;

        while ($retries < $maxRetries) {
            $randomTag = fake()->jobTitle();

            if (str_word_count($randomTag) < 3) {
                return [
                    'name' => $randomTag,
                ];
            }

            $retries++;
        }

        throw new Exception('Unable to find a job tag with less than 3 words.');
    }
}
