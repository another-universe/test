<?php

declare(strict_types=1);

namespace App\DataTransferObjects\Quote;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Attributes\Strict;
use App\Models\User;
use Illuminate\Http\Request;

#[Strict]
final class CreateQuoteData extends DataTransferObject
{
    public readonly string $text;

    public readonly string $language;

    public readonly User $user;

    public static function fromRequest(Request $request): self
    {
        return new self(
            text: $request->input('text'),
            language: \app()->getLocale(),
            user: $request->user(),
        );
    }
}
