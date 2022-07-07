<?php

declare(strict_types=1);

if (! function_exists('lroute')) {
    function lroute(string $name, array $parameters = [], bool $absolute = true): string
    {
        return url()->lroute($name, $parameters, $absolute);
    }
}
