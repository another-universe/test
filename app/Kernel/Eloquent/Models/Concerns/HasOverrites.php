<?php

declare(strict_types=1);

namespace App\Kernel\Eloquent\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Date;
use DateTimeInterface;
use LogicException;

trait HasOverrites
{
    /**
     * Create a new eloquent collection instance.
     */
    public function newCollection(array $models = []): Collection
    {
        throw new LogicException('This method must be implemented by the derived class.');
    }

    /**
     * Create a new eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     */
    public function newEloquentBuilder($query): Builder
    {
        throw new LogicException('This method must be implemented by the derived class.');
    }

    /**
     * Prepare a date for array / JSON serialization.
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return Date::instance($date)->toISOString(true);
    }

    /**
     * Get the format for database stored dates.
     */
    public function getDateFormat(): string
    {
        return 'Y-m-d H:i:s.u';
    }
}
