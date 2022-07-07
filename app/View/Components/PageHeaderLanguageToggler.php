<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

final class PageHeaderLanguageToggler extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return \view('components.page-header-language-toggler');
    }

    /**
     * Get items.
     */
    public function items(): array
    {
        $items = [];

        foreach (LaravelLocalization::getLocalesOrder() as $locale => $properties) {
            $items[] = [
                $locale,
                LaravelLocalization::getLocalizedURL($locale, null, [], true),
                \app()->isLocale($locale),
                Str::ucfirst($properties['native']),
            ];
        }

        return $items;
    }
}
