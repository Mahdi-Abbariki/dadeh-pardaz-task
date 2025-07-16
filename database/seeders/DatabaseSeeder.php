<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Always seed categories
        $this->call(ExpenditureCategorySeeder::class);

        // Seed fake users only in non-production environments
        if (app()->environment('local', 'testing')) {
            $this->call(UserSeeder::class);
        }
    }
}
