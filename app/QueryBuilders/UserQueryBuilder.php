<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

final class UserQueryBuilder extends Builder
{
    /* Scopes methods. */

    public function whereAuthEmail(string $email): self
    {
        return $this->where('email', '=', $email);
    }

    /* Resulting methods. */

    public function findByAuthEmail(string $email): ?User
    {
        return $this->whereAuthEmail($email)->first();
    }
}
