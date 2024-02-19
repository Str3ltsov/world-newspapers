<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('newspapers_users')->insert([
            [
                'role_id' => Role::ADMIN,
                'name' => 'Admin',
                'website' => null,
                'image' => null,
                'bio' => 'Administrator of world-newspapers.com',
                'username' => 'admin',
                'email' => 'admin@world-newspapers.com',
                'password' => Hash::make('password'),
                'status' => true,
                'timezone' => '',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
