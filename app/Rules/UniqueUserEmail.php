<?php

declare(strict_types=1);

namespace App\Rules;

use App\Kernel\Validation\Rule;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use ValueError;

final class UniqueUserEmail extends Rule
{
    private ?int $ignore = null;

    /**
     * Validate attribute.
     *
     * @throws ValueError
     */
    public function validate(string $attribute, mixed $value, array $parameters, Validator $validator): bool
    {
        $ignore = $parameters['ignore'] ?? null;

        if ($ignore !== null) {
            $ignore = \filter_var($ignore, \FILTER_VALIDATE_INT);

            if ($ignore === false || $ignore < 1) {
                throw new ValueError("The value of the 'ignore' parameter must be a positive integer.");
            }
        }

        return User::checkIfEmailIsAvailableForRegister($value, $ignore);
    }

    /**
     * Set "ignore" parameter.
     */
    public function ignore(int|User $ignore): self
    {
        if ($ignore instanceof User) {
            $ignore = $ignore->getId();
        }

        $this->ignore = $ignore;

        return $this;
    }

    /**
     * Get rule parameters.
     */
    protected function getParameters(): array
    {
        return [
            'ignore' => $this->ignore,
        ];
    }
}
