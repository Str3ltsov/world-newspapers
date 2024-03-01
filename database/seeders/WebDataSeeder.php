<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('newspapers_web_data')->insert([
            // Magazines links
            [
                'title' => 'Animals magazines | World-Newspapers.com',
                'heading' => 'Animals magazines',
                'description' => 'List of Animals magazines and journals with free online content.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Cats magazines | World-Newspapers.com',
                'heading' => 'Cats magazines',
                'description' => 'List of Cats magazines and journals with free online content.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Dogs magazines | World-Newspapers.com',
                'heading' => 'Dogs magazines',
                'description' => 'List of Dogs magazines and journals with free online content.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Horses magazines | World-Newspapers.com',
                'heading' => 'Horses magazines',
                'description' => 'List of Horses magazines and journals with free online content.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Arabian Horses magazines | World-Newspapers.com',
                'heading' => 'Arabian Horses magazines',
                'description' => 'List of Arabian Horses magazines and journals with free online content.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // News links
            [
                'title' => 'World News Sites | World-Newspapers.com',
                'heading' => 'World News Sites',
                'description' => 'Directory provides links to World News sources in English.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Major Newspapers | World-Newspapers.com',
                'heading' => 'Major Newspapers',
                'description' => 'Directory provides links to Major Newspapers sources in English.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'News Search Engines & Archives | World-Newspapers.com',
                'heading' => 'News Search Engines & Archives',
                'description' => 'Directory provides links to News Search Engines & Archives sources in English.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'World News Services | World-Newspapers.com',
                'heading' => 'World News Services',
                'description' => 'Directory provides links to World News Services sources in English.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Radio | World-Newspapers.com',
                'heading' => 'Radio',
                'description' => 'Directory provides links to Radio sources in English.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Television | World-Newspapers.com',
                'heading' => 'Television',
                'description' => 'Directory provides links to Television sources in English.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Main menu links
            [
                'title' => 'World Newspapers and Magazines on your Finger Tip | World-Newspapers.com',
                'heading' => 'World Newspapers and Magazines',
                'description' => 'Annotated directory of newspapers, magazines and news sites in English.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'News by Magazines | World-Newspapers.com',
                'heading' => 'News by Magazines',
                'description' => 'List of magazines and journals with free online content.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'News by Categories | World-Newspapers.com',
                'heading' => 'News by Categories',
                'description' => 'Annotated directory of news sites in English.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'News by Countries | World-Newspapers.com',
                'heading' => 'News by Countries',
                'description' => 'List of news sites and newspapers online by countries.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'United States Newspapers and News Sites | World-Newspapers.com',
                'heading' => 'News by United States',
                'description' => 'Find United States newspapers and news sites online.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Blog | World-Newspapers.com',
                'heading' => 'Blog',
                'description' => 'Annotated directory of newspapers, magazines and news sites in English.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Header links
            [
                'title' => 'About us | World-Newspapers.com',
                'heading' => 'About us',
                'description' => 'Annotated directory of newspapers, magazines and news sites in English.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Privacy policy | World-Newspapers.com',
                'heading' => 'Privacy policy',
                'description' => 'Annotated directory of newspapers, magazines and news sites in English.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Contact | World-Newspapers.com',
                'heading' => 'Contact',
                'description' => 'Annotated directory of newspapers, magazines and news sites in English.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Sitemap | World-Newspapers.com',
                'heading' => 'Sitemap',
                'description' => 'Annotated directory of newspapers, magazines and news sites in English.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Countries
            [
                'title' => 'North and Central America newspapers and news sites | World-Newspapers.com',
                'heading' => 'North and Central America Newspapers and News Sites',
                'description' => 'Find North and Central America newspapers and news sites online in English.',
                'keywords' => 'central, america, english, news, online, newspapers',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'European newspapers and news sites | World-Newspapers.com',
                'heading' => 'European Newspapers and News Sites',
                'description' => 'Find European newspapers and news sites online in English.',
                'keywords' => 'europe, news, english, european, newspapers',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'USA newspapers and news sites | World-Newspapers.com',
                'heading' => 'USA Newspapers and News Sites',
                'description' => 'Find USA newspapers and news sites online.',
                'keywords' => 'usa, online, news, today, online, top, best, newspapers, free',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Lithuania newspapers and news sites | World-Newspapers.com',
                'heading' => 'Lithuanian Newspapers and News Sites',
                'description' => 'Find Lithuanian newspapers and news sites online in English.',
                'keywords' => 'lithuania, news, english, online, newspapers',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Alabama newspapers and news sites | World-Newspapers.com',
                'heading' => 'Alabama Newspapers and News Sites',
                'description' => 'Find Alabama newspapers and news sites online.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Alaska newspapers and news sites | World-Newspapers.com',
                'heading' => 'Alaska Newspapers and News Sites',
                'description' => 'Find Alaska newspapers and news sites online.',
                'keywords' => 'news, newspapers, magazines, world',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
