<?php

declare(strict_types=1);

namespace App\Contracts\QuoteSharing;

interface FactoryInterface
{
    /**
     * Get a driver instance.
     */
    public function driver(?string $driver = null): DriverInterface;

    /**
     * get names of supported drivers.
     */
    public function getSupportedDrivers(): array;
}
