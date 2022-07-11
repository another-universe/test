<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Quote;
use Illuminate\Database\Eloquent\Builder;

final class QuoteQueryBuilder extends Builder
{
    /* Resulting methods. */

    public function checkCanBeAdded(string $text, string $language, Quote|int|null $ignore = null): bool
    {
        return $this
            ->where(static function ($query) use ($text, $language, $ignore) {
                $query
                    ->where('text', '=', $text)
                    ->where('language', '=', $language);

                if ($ignore !== null) {
                    $query->whereKeyNot($ignore);
                }
            })
            ->doesntExist();
    }
}
