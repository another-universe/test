<?php

declare(strict_types=1);

namespace App\Events\Quote;

use App\Models\Quote;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class QuoteWasEdited
{
    use Dispatchable;
    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly Quote $quote,
    ) {
    }
}
