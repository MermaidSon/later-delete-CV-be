<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $table = 'technologies';

    protected $fillable = [
        'title',
        'description',
        'items',
    ];

    protected $casts = [
        'items' => 'array',
    ];

    public $timestamps = true;
}
