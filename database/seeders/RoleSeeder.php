<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('newspapers_roles')->insert([
            [
                'title' => 'Admin',
                'alias' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Registered',
                'alias' => 'registered',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Public',
                'alias' => 'public',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
