<?php

declare(strict_types=1);

namespace App\Models\Concerns\User;

use App\Models\Quote;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Contracts\Pagination\CursorPaginator;
use Illuminate\Pagination\Cursor;

trait HasRelations
{
    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }

    public function addQuote(Quote $quote, bool $quietly = false): bool
    {
        if ($quietly) {
            $result = $this->quotes()->saveQuietly($quote);
        } else {
            $result = $this->quotes()->save($quote);
        }

        return $result !== false;
    }

    public function addQuotes(iterable $quotes, bool $quietly = false): int
    {
        $saved = 0;

        foreach ($quotes as $quote) {
            if ($this->addQuote($quote, $quietly)) {
                ++$saved;
            }
        }

        return $saved;
    }

    public function getQuotesWithPagination(?int $perPage = null, Cursor|string|null $cursor = null): CursorPaginator
    {
        return $this
            ->quotes()
            ->orderBy('id', 'desc')
            ->cursorPaginate(perPage: $perPage, cursor: $cursor);
    }
}
