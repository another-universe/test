<?php

declare(strict_types=1);

namespace App\Models\Concerns\Quote;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasRelations
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function associateUser(User $user): static
    {
        $this->user()->associate($user);

        return $this;
    }

    public function isBelongsTo(User $user): bool
    {
        return $user->getId() === $this->user_id;
    }
}
