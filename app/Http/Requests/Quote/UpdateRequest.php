<?php

declare(strict_types=1);

namespace App\Http\Requests\Quote;

use App\Rules\UniqueQuote;

final class UpdateRequest extends CreateOrUpdateRequest
{
    /**
     * Build "unique" rule.
     */
    protected function uniqueRule(): UniqueQuote
    {
        return parent::uniqueRule()->ignore($this->route('quote'));
    }
}
