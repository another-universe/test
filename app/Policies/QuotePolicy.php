<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Quote;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

final class QuotePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the entity.
     */
    public function update(User $user, Quote $quote): bool
    {
        return false;
    }
}
