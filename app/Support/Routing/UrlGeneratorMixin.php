<?php

declare(strict_types=1);

namespace App\Support\Routing;

use Closure;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

final class UrlGeneratorMixin
{
    public function lroute(): Closure
    {
        return function (string $name, array $parameters = [], bool $absolute = true): string {
            $url = $this->route($name, $parameters, $absolute);

            return LaravelLocalization::localizeURL($url);
        };
    }
}
