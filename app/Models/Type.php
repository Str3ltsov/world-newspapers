<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    const PAGE = 1;
    const BLOG = 2;
    const NODE = 3;
    const ATTACHMENT = 4;

    protected $table = 'newspapers_types';

    protected $fillable = [
        'id',
        'title',
        'alias',
        'description',
        'format_show_author',
        'format_show_date',
        'format_use_wysiwyg',
        'comment_status',
        'comment_approve',
        'comment_spam_protection',
        'comment_captcha',
        'params',
        'plugin',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'alias' => 'string',
        'description' => 'string',
        'format_show_author' => 'boolean',
        'format_show_date' => 'boolean',
        'format_use_wysiwyg' => 'boolean',
        'comment_status' => 'integer',
        'comment_approve' => 'boolean',
        'comment_spam_protection' => 'boolean',
        'comment_captcha' => 'boolean',
        'params' => 'string',
        'plugin' => 'string'
    ];
}
