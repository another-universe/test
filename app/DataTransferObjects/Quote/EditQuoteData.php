<?php

declare(strict_types=1);

namespace App\DataTransferObjects\Quote;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Attributes\Strict;
use Illuminate\Http\Request;

#[Strict]
final class EditQuoteData extends DataTransferObject
{
    public readonly string $text;

    public static function fromRequest(Request $request): self
    {
        return new self(
            text: $request->input('text'),
        );
    }
}
