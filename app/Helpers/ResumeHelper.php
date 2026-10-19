<?php

namespace App\Helpers;

use App\Models\Resume;

class ResumeHelper
{
    public static function getResumeData()
    {
        $resume = Resume::with('works')->orderBy('started_at', 'DESC')->get();

        return [
            'resume' =>  $resume->map(fn($resume) => [
                'company' => $resume->company,
                'position' => $resume->position,
                'period' => $resume->started_at->format('F Y') . 
                    ' — ' . ($resume->ended_at?->format('F Y') ?? 'Present'),
                'description' => $resume->description,
                'works' => $resume->works->map->text,
        ])];
    }

    public static function getResumeDataPanel()
    {
        $resume = Resume::with('works')->orderBy('started_at', 'DESC')->get();

        return [
            'resume' =>  $resume->map(fn($resume) => [
                'id' => $resume->id,
                'company' => $resume->company,
                'position' => $resume->position,
                'started_at' => $resume->started_at,
                'ended_at' => $resume->ended_at,
                'description' => $resume->description,
                'works' => $resume->works, //Maybe rewrote to desplay IDs
        ])];   
    }

    public static function addNewResume($resume)
    {
        
    }

    public static function updateResume($resume)
    {

    }

    public static function addResumeWorks($resume_id)
    {

    }

    public static function updateResumeWorks($resume_work_id)
    {

    }

    public static function deleteResume()
    {

    }

    public static function deleteResumeWorks()
    {

    }
}
