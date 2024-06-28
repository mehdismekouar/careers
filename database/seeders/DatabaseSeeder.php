<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use App\Models\JobTag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $numbers = [
            'employers' => 20,
            'jobs' => 60,
            'featured' => 3,
            'tags' => 20,
            'relations' => 100,
        ];

        if (!Storage::exists('logos')) {
            Storage::makeDirectory('logos');
        }

        Employer::factory($numbers['employers'])->create();

        for ($i = 0; $i < $numbers['jobs']; $i++) {

            Job::factory()->create([
                'employer_id' => Employer::inRandomOrder()->first()->id,
                'featured' => false,
            ]);
        }

        for ($i = 0; $i < $numbers['featured']; $i++) {

            Job::factory()->create([
                'employer_id' => Employer::inRandomOrder()->first()->id,
                'featured' => true,
            ]);
        }

        Tag::factory($numbers['tags'])->create();
        Tag::removeDuplicates();

        JobTag::factory($numbers['relations'])->create();
        JobTag::removeDuplicates();
    }
}
