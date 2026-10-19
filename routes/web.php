<?php

use App\Http\Controllers\PanelController;
use App\Http\Middleware\AuthPanelMiddleware;
use App\Http\Middleware\CheckTokenMiddleware;
use App\Http\Middleware\CheckUrlMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(CheckUrlMiddleware::class)->prefix('access/{url}')->group(function () 
{
    Route::get('/', [PanelController::class, 'GetAccessView']);
    Route::post('/', [PanelController::class, 'ValidateAccess']);

    Route::middleware(CheckTokenMiddleware::class)->group(function () 
    {
        Route::get('panel', [PanelController::class, 'GetPanelView']);
        Route::get('connection', [PanelController::class, 'Connection']);
        Route::get('data', [PanelController::class, 'GetAllData']);
    });
});