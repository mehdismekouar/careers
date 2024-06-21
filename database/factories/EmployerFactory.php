<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static function getInitials($string): string
    {
        $words = explode(' ', $string);

        $initials = '';
        foreach ($words as $word) {
            $initials .= substr($word, 0, 1);
        }

        return strtoupper($initials);
    }

    public function definition(): array
    {
        $company = fake()->company();

        $maxRetries = 10;
        $retries = 0;

        while ($retries < $maxRetries) {
            $word = static::getInitials($company);
            $colors = ['yellow', 'orange', 'lightblue', 'lighgray', 'lightgreen', 'beige', 'azure', 'burlywood', 'cornsilk', 'darkkhaki', 'darksalmon', 'gold', 'ghostwhite', 'honeydew'];

            $response = Http::get('https://placehold.co/100/' . $colors[array_rand($colors)] . '/black/svg?text=' . $word);

            if ($response->successful()) {
                $imageContent = $response->body();
                $logo = Str::random(32) . '.svg';
                $path = 'logos/' . $logo;

                Storage::put($path, $imageContent);

                return [
                    'name' => $company,
                    'logo' => basename($logo),
                    'user_id' => User::factory(),
                ];
            }

            /* $logo = fake()->image(storage_path('app/public/logos'), 100, 100);

            if ($logo) {
                return [
                    'name' => $company,
                    'logo' => basename($logo),
                    'user_id' => User::factory(),
                ];
            } */

            $retries++;
        }

        throw new Exception('Unable to download a logo.');
    }
}




