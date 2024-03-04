<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory;

    const MAGAZINE = 1;
    const NEWS = 2;
    const MAIN_MENU = 3;
    const HEADER = 4;

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

    public function links(): HasMany
    {
        return $this->hasMany(Link::class, 'menu_id', 'id');
    }
}
