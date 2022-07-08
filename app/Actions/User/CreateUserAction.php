<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Models\User;
use App\DataTransferObjects\User\CreateUserData;
use App\Support\Actions\HasEventDispatchable;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Auth\Events\Registered;
use Closure;

final class CreateUserAction
{
    use HasEventDispatchable;

    private ?Closure $afterCallback = null;

    /**
     * Create a new action instance.
     */
    public function __construct(
        private Hasher $hasher,
    ) {
    }

    /**
     * Execute action.
     */
    public function execute(CreateUserData $data): mixed
    {
        return \app('db.connection')->transaction(function () use ($data) {
            $user = new User();

            $user
                ->setEmail($data->email)
                ->setPassword($this->hasher->make($data->password))
                ->save();

            $result = \with($user, $this->afterCallback);

            $this->dispatchEvent(Registered::class, $user);

            return $result;
        });
    }

    /**
     * Add a callback that will be executed after the user is created.
     */
    public function onCreated(Closure $callback): self
    {
        $this->afterCallback = $callback;

        return $this;
    }
}
