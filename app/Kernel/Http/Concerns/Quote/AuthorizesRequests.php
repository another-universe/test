<?php

declare(strict_types=1);

namespace App\Kernel\Http\Concerns\Quote;

use App\Models\Quote;

trait AuthorizesRequests
{
    /**
     * Get the map of resource methods to ability names.
     */
    protected function resourceAbilityMap(): array
    {
        return [
            'edit' => 'update',
            'update' => 'update',
        ];
    }

    /**
     * Get the list of resource methods which do not have model parameters.
     */
    protected function resourceMethodsWithoutModels(): array
    {
        return [];
    }

    protected function applyPolicies(): void
    {
        $this->authorizeResource(Quote::class);
    }
}
