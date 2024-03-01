<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MagazineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('newspapers_magazines')->insert([
            [
                'link_id' => 1,
                'title' => 'Animal Fair',
                'url' => 'https://animalfair.com/',
                'description' => 'Lifestyle magazine for animal lovers. Includes special features on celebrities and their pets, along with information on animal health, nutrition, grooming, and training.',
                'cover' => 'animal-fair-1626176969.jpg',
                'cover_alt' => 'Animal Fair',
                'active' => true,
                'date' => '2021-04-25',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'link_id' => 1,
                'title' => 'Animal Wellness',
                'url' => 'https://animalwellnessmagazine.com/',
                'description' => 'Provides information on how to improve the quality of life of your animal companions and animals in the wild. Features articles on natural healing and nutrition, advice from animal experts, guidance on coping with pet loss, and more. ',
                'cover' => 'animal-wellness-magazine-1626177796.jpg',
                'cover_alt' => 'Animal Wellness',
                'active' => true,
                'date' => '2021-04-25',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'link_id' => 1,
                'title' => 'Underwater Times',
                'url' => 'http://www.underwatertimes.com/',
                'description' => 'News source on all things oceanic - from scuba-diving to underwater life.',
                'cover' => null,
                'cover_alt' => 'Underwater Times',
                'active' => true,
                'date' => '2021-04-25',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'link_id' => 1,
                'title' => 'Pet Business',
                'url' => 'https://www.petbusiness.com/',
                'description' => 'Pet magazine focused on the pet products industry, tips, and trends for pet speciality retailers.',
                'cover' => 'pet-business-1626178287.jpg',
                'cover_alt' => 'Pet Business',
                'active' => true,
                'date' => '2021-04-25',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'link_id' => 1,
                'title' => 'Reptiles',
                'url' => 'https://www.reptilesmagazine.com/',
                'description' => 'Features articles focused on the news about reptiles.',
                'cover' => 'reptiles-1626178532.jpg',
                'cover_alt' => 'Reptiles',
                'active' => true,
                'date' => '2021-04-25',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
