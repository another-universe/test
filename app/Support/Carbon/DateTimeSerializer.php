<?php

declare(strict_types=1);

namespace App\Support\Carbon;

use Carbon\CarbonInterface;

final class DateTimeSerializer
{
    /**
     * The date & time format.
     */
    public static ?string $format = null;

    /**
     * Handle the serialization of the DateTimeInterface instance.
     */
    public function __invoke(CarbonInterface $date): string
    {
        if (self::$format) {
            return $date->format(self::$format);
        }

        return $date->toISOString(true);
    }
}
