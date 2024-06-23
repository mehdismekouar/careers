<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\JobTag;
use App\Models\Tag;
use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $numbers = [
            'employers' => 20,
            'jobs' => 60,
            'featured' => 6,
            'tags' => 20,
            'relations' => 40
        ];

        /* $numbers = [
            'employers' => 0,
            'jobs' => 0,
            'featured' => 0,
            'tags' => 0,
            'relations' => 100
        ]; */

        if (!Storage::exists('logos')):
            Storage::makeDirectory('logos');
        endif;

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
