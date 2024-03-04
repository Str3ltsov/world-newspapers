<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('newspapers_menus')->insert([
            [
                'title' => 'Magazines',
                'alias' => 'magazines',
                'class' => '',
                'description' => '',
                'status' => 1,
                'link_count' => 189,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'News',
                'alias' => 'news',
                'class' => '',
                'description' => '',
                'status' => 1,
                'link_count' => 86,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Main menu',
                'alias' => 'main',
                'class' => '',
                'description' => '',
                'status' => 1,
                'link_count' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Header',
                'alias' => 'header',
                'class' => '',
                'description' => '',
                'status' => 1,
                'link_count' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
