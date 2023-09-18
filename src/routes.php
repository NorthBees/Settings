<?php

use Illuminate\Support\Facades\Route;

Route::middleware([
    'web',
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('admin')->name('admin.')->group(function () {
        Route::resource('settings', \NorthBees\Settings\Http\Controllers\SettingController::class);
    });

