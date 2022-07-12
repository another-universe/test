<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

final class ServicesRegistrarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('quote.sharing.service', static function ($app) {
            return new \App\Services\QuoteSharing\Manager($app);
        });
        $this->app->alias('quote.sharing.service', \App\Contracts\QuoteSharing\FactoryInterface::class);
        $this->app->alias('quote.sharing.service', \App\Services\QuoteSharing\Manager::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }
}
