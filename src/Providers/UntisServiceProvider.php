<?php

namespace Scool\Untis\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class UntisServiceProvider.
 *
 * @package Scool\Timetables\Providers
 */
class UntisServiceProvider extends ServiceProvider
{
    /**
     * Register package services.
     */
    public function register()
    {
        if (!defined('UNTIS_TIMETABLES_PATH')) {
            define('UNTIS_TIMETABLES_PATH', realpath(__DIR__.'/../../'));
        }

        $this->app->bind('Untis', function () {
            return new \Scool\Untis\Untis();
        });
    }

    /**
     * Bootstrap package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrations();
    }

    /**
     * Load migrations.
     */
    private function loadMigrations()
    {
        $this->loadMigrationsFrom(UNTIS_TIMETABLES_PATH . '/database/migrations');
    }

}