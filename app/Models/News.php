<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class News extends Model
{
    use HasFactory;

    protected $table = 'newspapers_news';

    protected $fillable = [
        'id',
        'link_id',
        'country_id',
        'title',
        'url',
        'local',
        'extra',
        'description',
        'logo',
        'logo_alt',
        'active',
        'check',
        'date',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'link_id' => 'integer',
        'country_id' => 'integer',
        'title' => 'string',
        'url' => 'string',
        'local' => 'integer',
        'extra' => 'string',
        'description' => 'string',
        'logo' => 'string',
        'logo_alt' => 'string',
        'active' => 'boolean',
        'check' => 'integer',
        'date' => 'date'
    ];

    public function link(): HasOne
    {
        return $this->hasOne(Link::class, 'id', 'link_id');
    }

    public function country(): HasOne
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
}
