<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\JenisLahan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            FarmPlaceSeeder::class,
            UserSeeder::class,
            JenisLahanSeeder::class,
            LahanSeeder::class,
        ]);
    }
}
