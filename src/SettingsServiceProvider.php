<?php

namespace NorthBees\Settings;

use App\AdminNavigation;
use App\AdminNavigationItem;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use NorthBees\Settings\Http\Controllers\SettingsCreate;
use NorthBees\Settings\Http\Controllers\SettingsUpdate;
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

         $this->publishes([
            __DIR__.'/../database/migrations' => $this->app->databasePath('migrations/tenants'),
        ]);
         
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'settings');

        $this->loadAdminComponents();
        $this->loadAdminNavigation();

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    public function loadAdminComponents()
    {
        Livewire::component('settings::settings-create', SettingsCreate::class);
        Livewire::component('settings::setting-update', SettingsUpdate::class);
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {

    }

    public function loadAdminNavigation()
    {
        $this->app['admin.navigation']->add(new AdminNavigationItem(
            'settings',
            'Settings',
            Setting::class,
            'settings',
            'admin.settings.index',
            100,
        ));
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
