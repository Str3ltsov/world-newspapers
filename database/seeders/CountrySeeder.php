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
        $webDataQuantity = WebData::all('id')->count();

        DB::table('newspapers_countries')->insert([
            // Continents
            [
                'parent_id' => null,
                'web_data_id' => $webDataQuantity - 7 + 1,
                'flag_id' => null,
                'code' => null,
                'title' => 'North and Central America',
                'link' => '/countries/north-and-central-america',
                'body' => null,
                'left' => 359,
                'right' => 474,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'parent_id' => null,
                'web_data_id' => $webDataQuantity - 7 + 2,
                'flag_id' => null,
                'code' => null,
                'title' => 'Europe',
                'link' => '/countries/europe',
                'body' => null,
                'left' => 200,
                'right' => 328,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Countries
            [
                'parent_id' => 1,
                'web_data_id' => $webDataQuantity - 7 + 3,
                'flag_id' => 1,
                'code' => 'us',
                'title' => 'USA',
                'link' => '/countries/north-and-central-america/usa',
                'body' => '<p>See also list of <a title="Canadian newspapers and online news sites." href="https://www.world-newspapers.com/countries/north-and-central-america/canada" target="_blank">Canadian newspapers and online news sites.</a></p>',
                'left' => 438,
                'right' => 553,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'parent_id' => 2,
                'web_data_id' => $webDataQuantity - 7 + 4,
                'flag_id' => 2,
                'code' => 'lt',
                'title' => 'Lithuania',
                'link' => '/countries/europe/lithuania',
                'body' => '<p>See also list of <a title="Latvian newspapers and online news sites in English." href="https://www.world-newspapers.com/countries/europe/latvia" target="_blank">Latvian newspapers and online news sites in English.</a></p>',
                'left' => 247,
                'right' => 248,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // States
            [
                'parent_id' => 3,
                'web_data_id' => $webDataQuantity - 7 + 5,
                'flag_id' => 3,
                'code' => 'us-al',
                'title' => 'Alabama',
                'link' => '/countries/north-and-central-america/usa/alabama',
                'body' => null,
                'left' => 439,
                'right' => 440,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'parent_id' => 3,
                'web_data_id' => $webDataQuantity - 7 + 6,
                'flag_id' => 4,
                'code' => 'us-ak',
                'title' => 'Alaska',
                'link' => '/countries/north-and-central-america/usa/alaska',
                'body' => null,
                'left' => 441,
                'right' => 442,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
