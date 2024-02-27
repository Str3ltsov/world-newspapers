<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebData extends Model
{
    use HasFactory;

    protected $table = 'newspapers_web_data';

    protected $fillable = [
        'id',
        'title',
        'heading',
        'description',
        'keywords',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'heading' => 'string',
        'description' => 'string',
        'keywords' => 'string'
    ];
}
