<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountryFlagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('newspapers_country_flags')->insert([
            [
                'title' => 'National flag of USA',
                'description' => 'Here you can find an exhaustive directory of local and national, subscription-free USA newspapers. Click on a state that interests you to find local news media sites, or browse our selection of major national titles below.',
                'image' => 'us.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Lithuania',
                'description' => "The Internet can be a great source of news. However, it's also cluttered with sites that aren't dedicated to the serious reporting of current affairs. Here, we're bringing you our carefully hand-picked list of Lithuanian English-language online newspapers that offer top-quality journalism and are dedicated to working with reliable sources and producing content that meets strict standards. Visit now to find out why readers will be coming back for more!",
                'image' => 'lt.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Alabama',
                'description' => 'Flag of Alabama.',
                'image' => 'us-al.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Alaska',
                'description' => 'Flag of Alaska.',
                'image' => 'us-ak.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
