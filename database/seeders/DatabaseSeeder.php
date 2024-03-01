<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            MenuSeeder::class,
            WebDataSeeder::class,
            LinkSeeder::class,
            MagazineSeeder::class,
            CountrySeeder::class,
            NewsSeeder::class,
            TypeSeeder::class,
            NodeSeeder::class,
            ContactSeeder::class
        ]);
    }
}
