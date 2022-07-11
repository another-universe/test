<?php

declare(strict_types=1);

namespace App\Actions\Quote;

use App\Models\Quote;
use App\DataTransferObjects\Quote\CreateQuoteData;
use App\Events\Quote\QuoteWasCreated;
use App\Support\Actions\HasEventDispatchable;

final class CreateQuoteAction
{
    use HasEventDispatchable;

    /**
     * Execute action.
     */
    public function execute(CreateQuoteData $data): Quote
    {
        return \app('db.connection')->transaction(function () use ($data) {
            $quote = new Quote();

            $quote
                ->setText($data->text)
                ->setLanguage($data->language)
                ->associateUser($data->user)
                ->save();

            $event = new QuoteWasCreated($quote);
            $this->dispatchEvent($event);

            return $quote;
        });
    }
}
