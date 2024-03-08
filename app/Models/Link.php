<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'web_data_id',
        'title',
        'class',
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
        'web_data_id' => 'integer',
        'title' => 'string',
        'class' => 'string',
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

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Link::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Link::class, 'parent_id', 'id');
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function webData(): HasOne
    {
        return $this->hasOne(WebData::class, 'id', 'web_data_id');
    }
}
