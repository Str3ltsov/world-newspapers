<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Country extends Model
{
    use HasFactory;

    public $table = 'newspapers_countries';

    protected $fillable = [
        'id',
        'parent_id',
        'flag_id',
        'code',
        'title',
        'link',
        'web_title',
        'web_heading',
        'web_description',
        'web_keywords',
        'description',
        'body',
        'left',
        'right',
        'active',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'parent_id' => 'integer',
        'flag_id' => 'integer',
        'code' => 'string',
        'title' => 'string',
        'link' => 'string',
        'web_title' => 'string',
        'web_heading' => 'string',
        'web_description' => 'string',
        'web_keywords' => 'string',
        'description' => 'string',
        'body' => 'string',
        'left' => 'integer',
        'right' => 'integer',
        'active' => 'boolean'
    ];

    public function parent(): HasOne
    {
        return $this->hasOne(Country::class, 'id', 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Country::class, 'parent_id', 'id');
    }

    public function flag(): HasOne
    {
        return $this->hasOne(CountryFlag::class, 'id', 'flag_id');
    }
}
