<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResumeWorks extends Model
{
    protected $table = 'resume_works';

    protected $fillable = [
        'resume_id',
        'text',
    ];

    public $timestamps = true;
}
