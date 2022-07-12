<?php

declare(strict_types=1);

namespace App\Contracts\QuoteSharing;

use App\Models\Quote;

interface DriverInterface
{
    /**
     * Send quote to recepient.
     */
    public function send(Quote $quote, string $recipient);

    /**
     * Set driver configuration.
     */
    public function setConfig(array $config): self;
}
