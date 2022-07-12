<?php

declare(strict_types=1);

namespace App\DataTransferObjects\Quote;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Attributes\Strict;
use Illuminate\Http\Request;

#[Strict]
final class ShareQuoteData extends DataTransferObject
{
    public readonly string $driver;

    public readonly string $recipient;

    public static function fromRequest(Request $request): self
    {
        return new self(
            driver: $request->input('channel'),
            recipient: $request->input('recipient'),
        );
    }
}
