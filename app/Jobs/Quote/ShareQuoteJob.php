<?php

declare(strict_types=1);

namespace App\Jobs\Quote;

use App\Models\Quote;
use App\DataTransferObjects\Quote\ShareQuoteData;
use App\Contracts\QuoteSharing\FactoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class ShareQuoteJob implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public readonly Quote $quote,
        public readonly ShareQuoteData $data,
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(FactoryInterface $factory): void
    {
        $driver = $factory->driver($this->data->driver);
        $driver->send($this->quote, $this->data->recipient);

        \rescue(fn () => $this->quote->incrementShared());
    }

    public function uniqueId(): string
    {
        $payload = [
            $this->quote->getId(),
            $this->data->driver,
            $this->data->recipient,
        ];

        return \hash('md5', \implode('|', $payload));
    }
}
