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

        if (!Storage::exists('logos')):
            Storage::makeDirectory('logos');
        endif;

        Employer::factory(20)->create();

        for ($i = 0; $i < 40; $i++) {

            Job::factory()->create([
                'employer_id' => Employer::inRandomOrder()->first()->id,
                'featured' => false,
            ]);
        }

        for ($i = 0; $i < 6; $i++) {

            Job::factory()->create([
                'employer_id' => Employer::inRandomOrder()->first()->id,
                'featured' => true,
            ]);
        }

        Tag::factory(20)->create();
        Tag::removeDuplicates();

        JobTag::factory(40)->create();
        JobTag::removeDuplicates();

    }
}
