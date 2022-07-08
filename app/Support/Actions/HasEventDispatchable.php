<?php

declare(strict_types=1);

namespace App\Support\Actions;

use Illuminate\Support\Arr;

trait HasEventDispatchable
{
    protected bool $quietly = false;

    /**
     * Prevent the action from sending events.
     */
    public function quietly(): static
    {
        $this->quietly = true;

        return $this;
    }

    /**
     * Dispatch an event.
     */
    protected function dispatchEvent(object|string $event, mixed $payload = [], bool $halt = false): ?array
    {
        if ($this->quietly) {
            return null;
        }

        [$event, $ppayload] = $this->parseEventAndPayload($event, $payload);

        return \event($event, $payload, $halt);
    }

    /**
     * Parse event and payload.
     */
    protected function parseEventAndPayload(object|string $event, mixed $payload): array
    {
        if (\is_object($event)) {
            return [$event, []];
        }

        $payload = Arr::wrap($payload);

        if (\str_contains($event, '\\') && \class_exists($event)) {
            $event = new $event(...$payload);

            return [$event, []];
        }

        return [$event, $payload];
    }
}
