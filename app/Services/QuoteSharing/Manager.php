<?php

declare(strict_types=1);

namespace App\Services\QuoteSharing;

use App\Contracts\QuoteSharing\FactoryInterface;
use App\Contracts\QuoteSharing\DriverInterface;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\Arr;
use Exception;

final class Manager implements FactoryInterface
{
    private Repository $config;

    private array $drivers = [];

    /**
     * Create a new manager instance.
     */
    public function __construct(
        private Container $container,
    ) {
        $this->config = $this->container->make('config');
    }

    /**
     * Get the default driver name.
     */
    public function getDefaultDriver(): string
    {
        $default = $this->config->get('quote_sharing.default');

        if ($default === null) {
            throw new Exception('Default driver not defined.');
        }

        return $default;
    }

    /**
     * Get a driver instance.
     */
    public function driver(?string $driver = null): DriverInterface
    {
        $driver = $driver ?: $this->getDefaultDriver();

        return $this->drivers[$driver] ??= $this->createDriver($driver);
    }

    /**
     * Create a driver instance.
     *
     * @throws Exception
     */
    private function createDriver(string $driver): DriverInterface
    {
        $config = $this->config->get('quote_sharing.drivers.'.$driver);

        if (! \is_array($config)) {
            throw new Exception('Missing configuration for '.$driver.' driver.');
        }

        $class = Arr::pull($config, 'class');

        if (! \is_string($class)) {
            throw new Exception('Used class for '.$driver.' driver not specified.');
        }

        if (! \is_subclass_of($class, DriverInterface::class, true)) {
            throw new Exception('The '.$class.' must be a class that implements '.DriverInterface::class.'.');
        }

        return $this->container->make($class)->setConfig($config);
    }

    /**
     * Get names of supported drivers.
     */
    public function getSupportedDrivers(): array
    {
        return \array_keys($this->config->get('quote_sharing.drivers', []));
    }

    /**
     * Forget specified driver or all drivers.
     */
    public function forgetDriver(?string $driver = null): void
    {
        if ($driver === null) {
            $this->drivers = [];
        } else {
            unset($this->drivers[$driver]);
        }
    }

    /**
     * Dynamically call the default driver instance.
     */
    public function __call(string $method, array $parameters): mixed
    {
        return $this->driver()->{$method}(...$parameters);
    }
}
