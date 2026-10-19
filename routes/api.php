<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;

Route::get('/resume', [DataController::class, 'GetResumeData']);
Route::get('/owner', [DataController::class, 'GetOwnerData']);
Route::get('/work', [DataController::class, 'GetWorkData']);
Route::get('/experience', [DataController::class, 'GetExperienceData']);

Route::prefix('v1/{url}')->middleware('CheckAccessKey')->group(function() {
    Route::get('/time/left', [PanelController::class, 'Connection']);
    Route::get('/data/all', [PanelController::class, 'GetAllData']);
});
