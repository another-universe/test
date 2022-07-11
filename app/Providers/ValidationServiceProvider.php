<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Contracts\Validation\Factory;
use Illuminate\Support\ServiceProvider;

final class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->resolving('validator', static function (Factory $factory) {
            $factory->extend('unique_user_email', \App\Rules\UniqueUserEmail::class);

            $factory->extend('unique_quote', \App\Rules\UniqueQuote::class);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }
}
