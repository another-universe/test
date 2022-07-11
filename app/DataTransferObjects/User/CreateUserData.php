<?php

declare(strict_types=1);

namespace App\DataTransferObjects\User;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Attributes\Strict;
use Illuminate\Http\Request;

#[Strict]
final class CreateUserData extends DataTransferObject
{
    public readonly string $email;

    public readonly string $password;

    public static function fromRequest(Request $request): self
    {
        return new self(
            email: $request->input('email'),
            password: $request->input('password'),
        );
    }
}
