<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $table = 'resumes';

    protected $fillable = [
        'position',
        'company',
        'description',
    ];

    protected $casts = [
        'started_at' => 'date',
        'ended_at' => 'date',
    ];

    public $timestamps = true;

    public function works()
    {
        return $this->hasMany(ResumeWorks::class, 'resume_id');
    }
}
