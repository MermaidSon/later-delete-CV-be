<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experience';

    protected $fillable = [
        'title',
        'text'
    ];

    public $timestamps = true;
}
