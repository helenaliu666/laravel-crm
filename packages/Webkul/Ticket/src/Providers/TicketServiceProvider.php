<?php

namespace Webkul\Ticket\Providers;

use Illuminate\Support\ServiceProvider;

class TicketServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');

        $this->loadRoutesFrom(__DIR__.'/../Routes/routes.php');

        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'ticket');

        $this->app->register(ModuleServiceProvider::class);
    }

    /**
     * Register services.
     */
    public function register(): void
    {
    }
}
