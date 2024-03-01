<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('newspapers_contacts')->insert([
            'title' => 'Contact',
            'alias' => 'contact',
            'body' => null,
            'name' => null,
            'position' => null,
            'address' => null,
            'address2' => null,
            'state' => null,
            'country' => null,
            'post_code' => null,
            'phone' => null,
            'fax' => null,
            'email' => 'info@world-newspapers.com',
            'message_status' => 1,
            'message_archive' => 1,
            'message_count' => 0,
            'message_spam_protection' => 0,
            'message_captcha' => 0,
            'message_notify' => 1,
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
