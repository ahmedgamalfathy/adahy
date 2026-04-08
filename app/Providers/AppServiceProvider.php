<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // تسجيل Services
        $this->app->singleton(
            \App\Services\Reservation\ReservationService::class
        );
        
        $this->app->singleton(
            \App\Services\Financial\TreasuryService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Pagination\Paginator::useBootstrap();
    }
}
