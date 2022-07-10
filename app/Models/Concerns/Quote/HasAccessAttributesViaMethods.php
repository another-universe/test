<?php

declare(strict_types=1);

namespace App\Models\Concerns\Quote;

use App\Models\User;
use Carbon\CarbonInterface;

trait HasAccessAttributesViaMethods
{
    public function getId(): int
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setLanguage(string $language): static
    {
        $this->language = $language;

        return $this;
    }

    public function getShared(): int
    {
        return $this->shared;
    }

    public function getCreatedAt(): CarbonInterface
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): CarbonInterface
    {
        return $this->updated_at;
    }

    public function getUser(): ?User
    {
        return $this->getRelationValue('user');
    }
}
