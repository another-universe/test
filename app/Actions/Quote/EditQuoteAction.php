<?php

declare(strict_types=1);

namespace App\Actions\Quote;

use App\Models\Quote;
use App\DataTransferObjects\Quote\EditQuoteData;
use App\Events\Quote\QuoteWasEdited;
use App\Support\Actions\HasEventDispatchable;

final class EditQuoteAction
{
    use HasEventDispatchable;

    /**
     * Execute action.
     */
    public function execute(Quote $quote, EditQuoteData $data): Quote
    {
        return \app('db.connection')->transaction(function () use ($quote, $data) {
            $quote
                ->setText($data->text)
                ->save();

            if ($quote->wasChanged(['text'])) {
                $event = new QuoteWasEdited($quote);
                $this->dispatchEvent($event);
            }

            return $quote;
        });
    }
}
