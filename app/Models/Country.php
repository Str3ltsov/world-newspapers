<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Country extends Model
{
    use HasFactory;

    protected $table = 'newspapers_countries';

    protected $fillable = [
        'id',
        'parent_id',
        'web_data_id',
        'flag_id',
        'code',
        'title',
        'link',
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
        'web_data_id' => 'integer',
        'flag_id' => 'integer',
        'code' => 'string',
        'title' => 'string',
        'link' => 'string',
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

    public function webData(): HasOne
    {
        return $this->hasOne(WebData::class, 'id', 'web_data_id');
    }

    public function flag(): HasOne
    {
        return $this->hasOne(CountryFlag::class, 'id', 'flag_id');
    }
}
