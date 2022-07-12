<?php

declare(strict_types=1);

namespace App\Services\QuoteSharing;

use App\Contracts\QuoteSharing\DriverInterface;
use App\Models\Quote;

final class TelegramDriver implements DriverInterface
{
    public function send(Quote $quote, string $recipient): void
    {
    }

    public function setConfig(array $config): self
    {
        return $this;
    }
}
