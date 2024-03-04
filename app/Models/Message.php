<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Message extends Model
{
    use HasFactory;

    protected $table = 'newspapers_messages';

    protected $fillable = [
        'id',
        'contact_id',
        'name',
        'email',
        'title',
        'body',
        'website',
        'phone',
        'address',
        'message_type',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'contact_id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'title' => 'string',
        'body' => 'string',
        'website' => 'string',
        'phone' => 'string',
        'address' => 'string',
        'message_type' => 'string',
        'status' => 'boolean'
    ];

    public function contact(): HasOne
    {
        return $this->hasOne(Contact::class, 'id', 'contact_id');
    }
}
