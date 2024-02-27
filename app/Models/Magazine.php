<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Magazine extends Model
{
    use HasFactory;

    protected $table = 'newspapers_magazines';

    protected $fillable = [
        'id',
        'link_id',
        'title',
        'url',
        'description',
        'cover',
        'cover_alt',
        'active',
        'date',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'link_id' => 'integer',
        'title' => 'string',
        'url' => 'string',
        'description' => 'string',
        'cover' => 'string',
        'cover_alt' => 'string',
        'active' => 'boolean',
        'date' => 'date'
    ];

    public function link(): HasOne
    {
        return $this->hasOne(Link::class, 'id', 'link_id');
    }
}
