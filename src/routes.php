<?php

use Illuminate\Support\Facades\Route;

Route::resource('settings', \NorthBees\Settings\Http\Controllers\SettingController::class)->middleware(['auth']);
