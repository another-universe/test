<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

final class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    protected function redirectTo($request): ?string
    {
        if ($request->expectsJson() || $request->is(['api/*'])) {
            return null;
        }

        return \lroute('login');
    }
}
