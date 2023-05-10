<?php

use NorthBees\Settings\Models\Setting;

if (!function_exists('system_setting')) {
    function system_setting($key, $default = null)
    {
        return cache()->remember('setting_' . $key, now()->addMinutes(60), function () use ($key, $default) {
            return Setting::where('key', $key)->value('value') ?? $default;
        });
    }
}
