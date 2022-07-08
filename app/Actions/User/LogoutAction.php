<?php

declare(strict_types=1);

namespace App\Actions\User;

use Illuminate\Auth\SessionGuard;
use Closure;
use LogicException;
use RuntimeException;

final class LogoutAction
{
    private ?Closure $handler = null;

    /**
     * Execute action.
     *
     * @throws LogicException
     * @throws RuntimeException
     */
    public function execute(): mixed
    {
        if ($this->handler === null) {
            throw new LogicException('The handler method not selected.');
        }

        return \call_user_func($this->handler);
    }

    /**
     * Log out using session.
     */
    public function useSession(?string $guard = null): self
    {
        $this->handler = static function () use ($guard): bool {
            $guard = \auth()->guard($guard);

            if (! $guard instanceof SessionGuard) {
                throw new RuntimeException('The guard is not an instance of the '.SessionGuard::class.' class.');
            }

            $guard->logoutCurrentDevice();

            return true;
        };

        return $this;
    }
}
