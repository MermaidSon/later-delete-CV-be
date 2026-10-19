<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $table = 'access';

    protected $fillable = [
        'token',
        'url',
        'valid_until'
    ];

    protected $casts = [
        'valid_until' => 'datetime'
    ];

    public $timestamps = true;
}
