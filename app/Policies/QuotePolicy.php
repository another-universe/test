<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Quote;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

final class QuotePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the entity.
     */
    public function update(User $user, Quote $quote): Response
    {
        if ($quote->isBelongsTo($user)) {
            return $this->allow();
        }

        return $this->deny();
    }
}
