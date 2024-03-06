<?php

namespace Database\Seeders;

use App\Models\WebData;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $webDataQuantity = WebData::all('id')->count() - 6;

        DB::table('newspapers_countries')->insert([
            // Continents
            [
                'parent_id' => null,
                'web_data_id' => $webDataQuantity + 1,
                'code' => null,
                'title' => 'North and Central America',
                'link' => '/countries/north-and-central-america',
                'body' => null,
                'flag' => null,
                'flag_alt' => 'Africa',
                'flag_info' => null,
                'left' => 359,
                'right' => 474,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'parent_id' => null,
                'web_data_id' => $webDataQuantity + 2,
                'code' => null,
                'title' => 'Europe',
                'link' => '/countries/europe',
                'body' => null,
                'flag' => null,
                'flag_alt' => 'Europe',
                'flag_info' => null,
                'left' => 200,
                'right' => 328,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Countries
            [
                'parent_id' => 1,
                'web_data_id' => $webDataQuantity + 3,
                'code' => 'us',
                'title' => 'USA',
                'link' => '/countries/north-and-central-america/usa',
                'body' => '<p>See also list of <a title="Canadian newspapers and online news sites." href="https://www.world-newspapers.com/countries/north-and-central-america/canada" target="_blank">Canadian newspapers and online news sites.</a></p>',
                'flag' => 'us.png',
                'flag_alt' => 'National flag of USA',
                'flag_info' => 'Here you can find an exhaustive directory of local and national, subscription-free USA newspapers. Click on a state that interests you to find local news media sites, or browse our selection of major national titles below.',
                'left' => 438,
                'right' => 553,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'parent_id' => 2,
                'web_data_id' => $webDataQuantity + 4,
                'code' => 'lt',
                'title' => 'Lithuania',
                'link' => '/countries/europe/lithuania',
                'body' => '<p>See also list of <a title="Latvian newspapers and online news sites in English." href="https://www.world-newspapers.com/countries/europe/latvia" target="_blank">Latvian newspapers and online news sites in English.</a></p>',
                'flag' => 'lt.png',
                'flag_alt' => 'Lithuania',
                'flag_info' => "The Internet can be a great source of news. However, it's also cluttered with sites that aren't dedicated to the serious reporting of current affairs. Here, we're bringing you our carefully hand-picked list of Lithuanian English-language online newspapers that offer top-quality journalism and are dedicated to working with reliable sources and producing content that meets strict standards. Visit now to find out why readers will be coming back for more!",
                'left' => 247,
                'right' => 248,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // States
            [
                'parent_id' => 3,
                'web_data_id' => $webDataQuantity + 5,
                'code' => 'us-al',
                'title' => 'Alabama',
                'link' => '/countries/north-and-central-america/usa/alabama',
                'body' => null,
                'flag' => 'us-al.png',
                'flag_alt' => 'Alabama',
                'flag_info' => null,
                'left' => 439,
                'right' => 440,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'parent_id' => 3,
                'web_data_id' => $webDataQuantity + 6,
                'code' => 'us-ak',
                'title' => 'Alaska',
                'link' => '/countries/north-and-central-america/usa/alaska',
                'body' => null,
                'flag' => 'us-ak.png',
                'flag_alt' => 'Alaska',
                'flag_info' => null,
                'left' => 441,
                'right' => 442,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
