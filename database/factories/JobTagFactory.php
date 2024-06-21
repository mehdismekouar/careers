<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\JobTag;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Exception;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobTag>
 */
use Illuminate\Support\Facades\Log;

class JobTagFactory extends Factory
{
    public function definition(): array
    {
        $maxRetries = 10;
        $retries = 0;

        while ($retries < $maxRetries) {
            $randomJob = Job::inRandomOrder()->first()->id;
            $randomTag = Tag::inRandomOrder()->first()->id;

            try {
                // Attempt to create a new JobTag entry
                JobTag::create([
                    'job_id' => $randomJob,
                    'tag_id' => $randomTag,
                ]);

                // If successful, return the created entry
                return [
                    'job_id' => $randomJob,
                    'tag_id' => $randomTag,
                ];
            } catch (\Illuminate\Database\QueryException $e) {
                // Handle the exception if a duplicate entry is inserted
                logger($randomJob . ' - ' . $randomTag . ' already exists.');
                $retries++;
            }
        }

        throw new Exception('Unable to find a unique job_id and tag_id pair after maximum retries.');
    }
}


