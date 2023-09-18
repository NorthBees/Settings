<?php

namespace NorthBees\Settings;

use App\AdminNavigation;
use App\AdminNavigationItem;
use Illuminate\Support\ServiceProvider;
use NorthBees\Settings\Models\Setting;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'settings');

        //        Livewire::component('some-component', SomeComponent::class);


        $this->app['admin.navigation']->add(new AdminNavigationItem(
            'settings',
            'Settings',
            Setting::class,
            'settings',
            'admin.settings.index',
            100,
        ));


        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['settings'];
    }
}
