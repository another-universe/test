<?php

declare(strict_types=1);

namespace App\View\Components\PageHeaderMenu;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class GuestMenu extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return \view('components.page-header-menu.guest-menu');
    }
}
