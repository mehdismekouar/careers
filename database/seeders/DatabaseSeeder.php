<?php

namespace Database\Seeders;
use Database\Seeders\AllSeeder;

use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $seed = new AllSeeder;
        $seed->run();
        
        /* User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'is_Admin' => true
        ]); */
    }
}
