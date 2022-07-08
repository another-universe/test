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

    public function checkIfEmailIsAvailableForRegister(string $email, int|User|null $ignore = null): bool
    {
        return $this
            ->where(static function ($query) use ($email, $ignore) {
                $query->whereAuthEmail($email);

                if ($ignore !== null) {
                    $query->whereKeyNot($ignore);
                }
            })
            ->doesntExist();
    }
}
