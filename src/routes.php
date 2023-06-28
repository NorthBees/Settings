<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('settings', \NorthBees\Settings\Http\Controllers\SettingController::class)->middleware(['auth']);
    });
