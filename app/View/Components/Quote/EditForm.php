<?php

declare(strict_types=1);

namespace App\View\Components\Quote;

use App\Models\Quote;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class EditForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Quote $quote,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return \view('components.quote.edit-form');
    }
}
