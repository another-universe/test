<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Auth\SessionGuard;
use Closure;
use LogicException;
use RuntimeException;

final class LoginAction
{
    private ?Closure $handler = null;

    /**
     * Execute action.
     *
     * @throws LogicException
     * @throws RuntimeException
     */
    public function execute(User $user): mixed
    {
        if ($this->handler === null) {
            throw new LogicException('The handler method not selected.');
        }

        return \call_user_func($this->handler, $user);
    }

    /**
     * Authenticate the user using session.
     */
    public function useSession(bool $remember = false, ?string $guard = null): self
    {
        $this->handler = static function ($user) use ($remember, $guard): bool {
            $guard = \auth()->guard($guard);

            if (! $guard instanceof SessionGuard) {
                throw new RuntimeException('The guard is not an instance of the '.SessionGuard::class.' class.');
            }

            $guard->login($user, $remember);

            return true;
        };

        return $this;
    }
}
