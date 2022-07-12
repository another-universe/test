<?php

declare(strict_types=1);

if (! function_exists('___')) {
    function ___(string $key, Countable|int|array $number, array $replace = [], ?string $locale = null): string
    {
        return app('translator')->choice($key, $number, $replace, $locale);
    }
}

if (! function_exists('lroute')) {
    function lroute(string $name, array $parameters = [], bool $absolute = true): string
    {
        return url()->lroute($name, $parameters, $absolute);
    }
}
