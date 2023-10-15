<?php

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('settings', \NorthBees\Settings\Http\Controllers\SettingController::class);
});

