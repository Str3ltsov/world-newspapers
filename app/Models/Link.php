<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Link extends Model
{
    use HasFactory;

    protected $table = 'newspapers_links';

    protected $fillable = [
        'id',
        'parent_id',
        'menu_id',
        'title',
        'class',
        'web_title',
        'web_heading',
        'web_description',
        'web_keywords',
        'description',
        'link',
        'body',
        'target',
        'rel',
        'status',
        'left',
        'right',
        'visibility_roles',
        'params',
        'publish_start',
        'publish_end',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'parent_id' => 'integer',
        'menu_id' => 'integer',
        'title' => 'string',
        'class' => 'string',
        'web_title' => 'string',
        'web_heading' => 'string',
        'web_description' => 'string',
        'web_keywords' => 'string',
        'description' => 'string',
        'link' => 'string',
        'body' => 'string',
        'target' => 'string',
        'rel' => 'string',
        'status' => 'integer',
        'left' => 'integer',
        'right' => 'integer',
        'visibility_roles' => 'string',
        'params' => 'string',
        'publish_start' => 'datetime',
        'publish_end' => 'datetime'
    ];

    public function parent(): HasOne
    {
        return $this->hasOne(Link::class, 'id', 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Link::class, 'id', 'parent_id');
    }

    public function menu(): HasOne
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }
}
