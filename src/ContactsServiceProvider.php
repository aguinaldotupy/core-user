<?php

namespace Tupy\Contacts;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class ContactsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     * @param Filesystem $filesystem
     */
    public function boot(Filesystem $filesystem)
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('contacts.php'),
            ], 'contacts-config');

            $this->publishes([
                __DIR__ . '/../database/migrations/create_tables.stub' => $this->getMigrationFileName($filesystem),
            ], 'contacts-migrations');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'contacts');

        // Register the main class to use with the facade
        $this->app->singleton('contacts', function () {
            return new Contacts;
        });
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param Filesystem $filesystem
     * @return string
     */
    protected function getMigrationFileName(Filesystem $filesystem): string
    {
        $timestamp = date('Y_m_d_His');

        return Collection::make($this->app->databasePath() . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem) {
                return $filesystem->glob($path . '*_create_tables.php');
            })->push($this->app->databasePath() . "/migrations/{$timestamp}_create_tables.php")
            ->first();
    }
}
