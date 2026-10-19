<?php

namespace App\Helpers;

use App\Models\Technology;
use App\Models\Work;

class WorkHelper
{
    public static function getWorkData()
    {
        $technologies = Technology::all();
        $works = Work::all();

        return [
            'technology' => $technologies->map(fn($technology) => [
                'title' => $technology->title,
                'description' => $technology->description,
                'items' => $technology->items,
            ]),
            'work' => $works->map(fn($work) => [
                'title' => $work->title,
                'text' => $work->text,
            ]),
        ];
    }

    public static function getWorkDataPanel()
    {
        $technologies = Technology::all();
        $works = Work::all();

        return [
            'technology' => $technologies->map(fn($technology) => [
                'id' => $technology->id,
                'title' => $technology->title,
                'description' => $technology->description,
                'items' => $technology->items,
            ]),
            'work' => $works->map(fn($work) => [
                'id' => $work,
                'title' => $work->title,
                'text' => $work->text,
            ]),
        ];
    }
}