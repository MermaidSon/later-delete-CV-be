<?php

namespace App\Http\Controllers;

use App\Helpers\ExperienceHelper;
use App\Helpers\OwnerHelper;
use App\Helpers\ResumeHelper;
use App\Helpers\WorkHelper;

class DataController extends Controller
{
    public function GetOwnerData()
    {
        $result = OwnerHelper::getOwnerData();
        if(!$result)
            return self::Response(false, 'Some fields are empty', 400);

        return self::Response(true, 'Success', 200, $result);
    }

    public function GetResumeData()
    {
        $resume = ResumeHelper::getResumeData();
        if(empty($resume['resume']) || !count($resume['resume']))
            return self::Response(false, 'Empty content', 400);
        
        return self::Response(true, 'Success', 200, $resume);
    }

    public function GetWorkData()
    {
        $work = WorkHelper::getWorkData();
        if(empty($work) || empty($work['technology']) || empty($work['work'])) 
            return self::Response(false, 'Empty content or one of the blocks', 400);
        
        return self::Response(true, 'Success', 200, $work);
    }

    public function GetExperienceData()
    {
        $experience = ExperienceHelper::getExperienceData();
        if(empty($experience) || empty($experience['experience']))
            return self::Response(false, 'Empty content', 400);

        return self::Response(true, 'Success', 200, $experience);
    }
}
