<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'newspapers_menus';

    protected $fillable = [
        'id',
        'title',
        'alias',
        'class',
        'description',
        'status',
        'weight',
        'link_count',
        'params',
        'publish_start',
        'publish_end',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'alias' => 'string',
        'class' => 'string',
        'description' => 'string',
        'status' => 'integer',
        'weight' => 'integer',
        'link_count' => 'integer',
        'params' => 'string',
        'publish_start' => 'datetime',
        'publish_end' => 'datetime'
    ];
}
