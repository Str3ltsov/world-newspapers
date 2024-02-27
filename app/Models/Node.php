<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Node extends Model
{
    use HasFactory;

    protected $table = 'newspapers_nodes';

    protected $fillable = [
        'id',
        'parent_id',
        'user_id',
        'title',
        'slug',
        'body',
        'excerpt',
        'status',
        'mime_type',
        'comment_status',
        'comment_count',
        'promote',
        'path',
        'terms',
        'sticky',
        'left',
        'right',
        'visibility_roles',
        'type',
        'publish_start',
        'publish_end',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'parent_id' => 'integer',
        'user_id' => 'integer',
        'title' => 'string',
        'slug' => 'string',
        'body' => 'string',
        'excerpt' => 'string',
        'status' => 'integer',
        'mime_type' => 'string',
        'comment_status' => 'integer',
        'comment_count' => 'integer',
        'promote' => 'boolean',
        'path' => 'string',
        'terms' => 'string',
        'sticky' => 'boolean',
        'left' => 'integer',
        'right' => 'integer',
        'visibility_roles' => 'string',
        'type' => 'string',
        'publish_start' => 'datetime',
        'publish_end' => 'datetime'
    ];

    public function parent(): HasOne
    {
        return $this->hasOne(Node::class, 'id', 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Node::class, 'parent_id', 'id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
