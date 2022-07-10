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

    public function associateUser(User $user, bool $save = true): bool|static
    {
        $this->user()->associate($user);

        if ($save) {
            return $this->save() ? $this : false;
        }

        return $this;
    }
}
