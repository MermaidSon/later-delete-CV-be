<?php

namespace App\Helpers;

use App\Models\Access;
use Illuminate\Support\Str;

class PanelHelper
{
    public static function generateKey(): array
    {
        $token = Str::random(64);

        $access = new Access();
        $access->token = hash('sha512', $token);
        $access->url = Str::random(32);
        $access->valid_until = now()->addHour();
        $access->save();

        return ['token' => $token, 'url' => $access->url];
    }

    public static function getAllData()
    {
        $owner = OwnerHelper::getOwnerDataPanel();
        if(!$owner || empty($owner))
            return -1;

        $resume = ResumeHelper::getResumeDataPanel();
        if(!$resume || !isset($resume['resume']) || empty($resume['resume']))
            return -2;

        $work = WorkHelper::getWorkDataPanel();
        if(!$work || !isset($work['work']) || empty($work['work']) 
            || !isset($work['technology']) || empty($work['technology']))
            return -3;

        $experience = ExperienceHelper::getExperienceDataPanel();
        if(!$experience || !isset($experience['experience']) || empty($experience['experience']))
            return -4;

        return [$owner, $resume, $work, $experience];
    }
}