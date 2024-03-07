<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('newspapers_types')->insert([
            [
                'title' => 'Page',
                'alias' => 'page',
                'description' => 'A page is a simple method for creating and displaying information that rarely changes, such as an "About us" section of a website. By default, a page entry does not allow visitor comments.',
                'format_show_author' => false,
                'format_show_date' => false,
                'format_use_wysiwyg' => true,
                'comment_status' => 0,
                'comment_approve' => true,
                'comment_spam_protection' => false,
                'comment_captcha' => false,
                'params' => null,
                'plugin' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Blog',
                'alias' => 'blog',
                'description' => 'A blog entry is a single post to an online journal, or blog.',
                'format_show_author' => false,
                'format_show_date' => true,
                'format_use_wysiwyg' => true,
                'comment_status' => 2,
                'comment_approve' => true,
                'comment_spam_protection' => false,
                'comment_captcha' => false,
                'params' => null,
                'plugin' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Node',
                'alias' => 'node',
                'description' => 'Default content type.',
                'format_show_author' => true,
                'format_show_date' => true,
                'format_use_wysiwyg' => true,
                'comment_status' => 2,
                'comment_approve' => true,
                'comment_spam_protection' => false,
                'comment_captcha' => false,
                'params' => null,
                'plugin' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Attachment',
                'alias' => 'attachment',
                'description' => 'An attachment can be any type of image file.',
                'format_show_author' => false,
                'format_show_date' => false,
                'format_use_wysiwyg' => true,
                'comment_status' => 0,
                'comment_approve' => false,
                'comment_spam_protection' => false,
                'comment_captcha' => false,
                'params' => null,
                'plugin' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
