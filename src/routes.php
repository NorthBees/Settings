<?php

use Illuminate\Support\Facades\Route;

Route::resource('settings', SettingController::class)->middleware(['auth']);
