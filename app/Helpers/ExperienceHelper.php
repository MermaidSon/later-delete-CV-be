<?php

namespace App\Helpers;

use App\Models\Experience;

class ExperienceHelper
{
    public static function getExperienceData()
    {
        $experience = Experience::all();

        return [
            'experience' => $experience->map(fn($exp) => [
                'title' => $exp->title,
                'text' => $exp->text,
            ]),
        ];
    }

    public static function getExperienceDataPanel()
    {
        $experience = Experience::all();

        return [
            'experience' => $experience->map(fn ($exp) => [
                'id' => $exp->id,
                'title' => $exp->title,
                'text' => $exp->text,
            ]),
        ];
    }
}