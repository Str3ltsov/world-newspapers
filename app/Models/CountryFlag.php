<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryFlag extends Model
{
    use HasFactory;

    public $table = 'newspapers_country_flags';

    protected $fillable = [
        'id',
        'image',
        'title',
        'description',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'image' => 'string',
        'title' => 'string',
        'description' => 'string'
    ];
}
