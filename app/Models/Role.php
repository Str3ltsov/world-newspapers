<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ADMIN = 1;
    const REGISTERED = 2;
    const PUBLIC = 3;

    protected $table = 'newspapers_roles';

    protected $fillable = [
        'id',
        'title',
        'alias',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'alias' => 'string'
    ];
}
