<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'newspapers_contacts';

    protected $fillable = [
        'id',
        'title',
        'alias',
        'body',
        'name',
        'position',
        'address',
        'address2',
        'state',
        'country',
        'post_code',
        'phone',
        'fax',
        'email',
        'message_status',
        'message_archive',
        'message_count',
        'message_spam_protection',
        'message_captcha',
        'message_notify',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'alias' => 'string',
        'body' => 'string',
        'name' => 'string',
        'position' => 'string',
        'address' => 'string',
        'address2' => 'string',
        'state' => 'string',
        'country' => 'string',
        'post_code' => 'string',
        'phone' => 'string',
        'fax' => 'string',
        'email' => 'string',
        'message_status' => 'boolean',
        'message_archive' => 'boolean',
        'message_count' => 'integer',
        'message_spam_protection' => 'boolean',
        'message_captcha' => 'boolean',
        'message_notify' => 'boolean',
        'status' => 'boolean'
    ];
}
