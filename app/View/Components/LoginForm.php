<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class LoginForm extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return \view('components.login-form');
    }
}
