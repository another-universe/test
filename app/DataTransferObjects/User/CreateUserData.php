<?php

declare(strict_types=1);

namespace App\DataTransferObjects\User;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
final class CreateUserData extends DataTransferObject
{
    public readonly string $email;

    public readonly string $password;
}
