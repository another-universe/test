<?php

declare(strict_types=1);

namespace App\View\Components\Quote;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\Pagination\CursorPaginator;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use ValueError;

final class QuotesList extends Component
{
    private const TYPES = [
        'user_quotes', 'all_quotes',
    ];

    /**
     * Create a new component instance.
     *
     * @throws ValueError
     */
    public function __construct(
        public CursorPaginator|Paginator $quotes,
        private string $templateType = 'all_quotes',
    ) {
        if (! \in_array($this->templateType, self::TYPES, true)) {
            throw new ValueError('Unknow type '.$this->templateType.'.');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        if ($this->templateType === 'user_quotes') {
            return \view('components.quote.quotes-list.user-quotes');
        }

        return \view('components.quote.quotes-list.all-quotes');
    }
}
