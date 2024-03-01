<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('newspapers_news')->insert([
            // MAJOR NEWSPAPERS
            [
                'link_id' => 7,
                'country_id' => null,
                'title' => 'Boston Globe',
                'url' => 'http://www.boston.com/',
                'local' => 0,
                'extra' => null,
                'description' => null,
                'logo' => null,
                'logo_alt' => 'Boston Globe',
                'active' => true,
                'check' => 0,
                'date' => '2021-04-25',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'link_id' => 7,
                'country_id' => null,
                'title' => 'Chicago Tribune',
                'url' => 'http://www.chicagotribune.com/',
                'local' => 0,
                'extra' => null,
                'description' => null,
                'logo' => null,
                'logo_alt' => 'Chicago Tribune',
                'active' => true,
                'check' => 0,
                'date' => '2021-04-25',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // NEWS SEARCH ENGINES & ARCHIVES
            [
                'link_id' => 8,
                'country_id' => null,
                'title' => 'Google News',
                'url' => 'http://news.google.com/',
                'local' => 0,
                'extra' => null,
                'description' => null,
                'logo' => null,
                'logo_alt' => 'Google News',
                'active' => true,
                'check' => 0,
                'date' => '2021-04-25',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'link_id' => 8,
                'country_id' => null,
                'title' => 'Rocketinfo',
                'url' => 'http://www.rocketnews.com',
                'local' => 0,
                'extra' => null,
                'description' => null,
                'logo' => null,
                'logo_alt' => 'Rocketinfo',
                'active' => true,
                'check' => 0,
                'date' => '2021-04-25',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // WORLD NEWS SERVICES
            [
                'link_id' => 9,
                'country_id' => null,
                'title' => '1st Headlines',
                'url' => 'http://www.1stheadlines.com/',
                'local' => 0,
                'extra' => null,
                'description' => null,
                'logo' => null,
                'logo_alt' => '1st Headlines',
                'active' => true,
                'check' => 0,
                'date' => '2021-04-25',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'link_id' => 9,
                'country_id' => null,
                'title' => 'Agence France-Presse',
                'url' => 'http://www.afp.com/afpcom/en/',
                'local' => 0,
                'extra' => null,
                'description' => null,
                'logo' => null,
                'logo_alt' => 'Agence France-Presse',
                'active' => true,
                'check' => 0,
                'date' => '2021-04-25',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // RADIO
            [
                'link_id' => 10,
                'country_id' => null,
                'title' => 'CounterSpin',
                'url' => 'http://www.fair.org/counterspin/',
                'local' => 0,
                'extra' => null,
                'description' => null,
                'logo' => null,
                'logo_alt' => 'CounterSpin',
                'active' => true,
                'check' => 0,
                'date' => '2021-04-25',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'link_id' => 10,
                'country_id' => null,
                'title' => 'Democracy Now',
                'url' => 'http://democracynow.org/',
                'local' => 0,
                'extra' => null,
                'description' => null,
                'logo' => null,
                'logo_alt' => 'Democracy Now',
                'active' => true,
                'check' => 0,
                'date' => '2021-04-25',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // TELEVISION
            [
                'link_id' => 11,
                'country_id' => null,
                'title' => 'CounterSpin',
                'url' => 'http://www.fair.org/counterspin/',
                'local' => 0,
                'extra' => null,
                'description' => null,
                'logo' => null,
                'logo_alt' => 'CounterSpin',
                'active' => true,
                'check' => 0,
                'date' => '2021-04-25',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'link_id' => 11,
                'country_id' => null,
                'title' => 'Al-Jazeera',
                'url' => 'http://english.aljazeera.net/',
                'local' => 0,
                'extra' => null,
                'description' => null,
                'logo' => null,
                'logo_alt' => 'Al-Jazeera',
                'active' => true,
                'check' => 0,
                'date' => '2021-04-25',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // UNITED STATES OF AMERICA
            [
                'link_id' => null,
                'country_id' => 3,
                'title' => '1st Headlines (news aggregator website)',
                'url' => 'http://www.1stheadlines.com/',
                'local' => 1,
                'extra' => null,
                'description' => null,
                'logo' => null,
                'logo_alt' => '1st Headlines (news aggregator website)',
                'active' => true,
                'check' => 0,
                'date' => '2021-04-26',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'link_id' => null,
                'country_id' => 3,
                'title' => 'ABC',
                'url' => 'https://abcnews.go.com/',
                'local' => 1,
                'extra' => null,
                'description' => null,
                'logo' => null,
                'logo_alt' => 'ABC',
                'active' => true,
                'check' => 0,
                'date' => '2021-04-26',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // LITHUANIA
            [
                'link_id' => null,
                'country_id' => 4,
                'title' => 'Baltic News Network',
                'url' => 'https://bnn-news.com/',
                'local' => 0,
                'extra' => null,
                'description' => 'Online news portal for and about the Baltic region.',
                'logo' => 'baltic-news-network-1628006004.png',
                'logo_alt' => 'Baltic News Network',
                'active' => true,
                'check' => 0,
                'date' => '2021-08-03',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'link_id' => null,
                'country_id' => 4,
                'title' => 'Baltic Review',
                'url' => 'https://baltic-review.com/category/baltics/lithuania/',
                'local' => 0,
                'extra' => null,
                'description' => 'Independent newspaper bring the top news stories from around the Baltics and the world. Based in Vilnius.',
                'logo' => 'baltic-review-1628006333.png',
                'logo_alt' => 'Baltic Review',
                'active' => true,
                'check' => 0,
                'date' => '2021-08-03',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // ALABAMA
            [
                'link_id' => null,
                'country_id' => 5,
                'title' => '49 County News',
                'url' => 'http://www.49countynews.net/',
                'local' => 1,
                'extra' => null,
                'description' => null,
                'logo' => null,
                'logo_alt' => '49 County News',
                'active' => true,
                'check' => 0,
                'date' => '2021-04-26',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'link_id' => null,
                'country_id' => 5,
                'title' => 'ABC 31 Channel news',
                'url' => 'http://www.waaytv.com/',
                'local' => 1,
                'extra' => null,
                'description' => null,
                'logo' => null,
                'logo_alt' => 'ABC 31 Channel news',
                'active' => true,
                'check' => 0,
                'date' => '2021-04-26',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // ALASKA
            [
                'link_id' => null,
                'country_id' => 6,
                'title' => 'Alaska',
                'url' => 'http://www.alaskamagazine.com/',
                'local' => 1,
                'extra' => null,
                'description' => null,
                'logo' => null,
                'logo_alt' => 'Alaska',
                'active' => true,
                'check' => 0,
                'date' => '2021-04-26',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'link_id' => null,
                'country_id' => 6,
                'title' => 'Alaska Business Monthly',
                'url' => 'http://www.akbizmag.com/',
                'local' => 1,
                'extra' => null,
                'description' => null,
                'logo' => null,
                'logo_alt' => 'Alaska Business Monthly',
                'active' => true,
                'check' => 0,
                'date' => '2021-04-26',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
