<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;

Route::get('/owner', [DataController::class, 'GetOwnerData']);
Route::get('/resume', [DataController::class, 'GetResumeData']);
Route::get('/work', [DataController::class, 'GetWorkData']);
Route::get('/experience', [DataController::class, 'GetExperienceData']);
Route::get('/technologies', [DataController::class, 'GetTechnologiesData']);
Route::get('/contacts', [DataController::class, 'GetContactsData']);

Route::prefix('v1/{url}')->middleware('CheckAccessKey')->group(function() {
    Route::get('/time/left', [PanelController::class, 'Connection']);
    Route::get('/data/all', [PanelController::class, 'GetAllData']);
});
