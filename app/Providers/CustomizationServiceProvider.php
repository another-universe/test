<?php

declare(strict_types=1);

namespace App\Providers;

use App\Support\Carbon\DateTimeSerializer;
use App\Support\Routing\UrlGeneratorMixin;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

final class CustomizationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->customizeUrlGenerator();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->customizeCarbon();
    }

    private function customizeCarbon(): void
    {
        Date::useClass(CarbonImmutable::class);
        Date::serializeUsing(new DateTimeSerializer());
    }

    private function customizeUrlGenerator(): void
    {
        $this->app->resolving('url', static function () {
            URL::mixin(new UrlGeneratorMixin());
        });
    }
}
