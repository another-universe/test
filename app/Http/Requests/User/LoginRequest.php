<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use Closure;
use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Foundation\Http\FormRequest;

final class LoginRequest extends FormRequest
{
    private ?User $authUser = null;

    /**
     * Get data to be validated from the request.
     */
    public function validationData(): array
    {
        return $this->only([
            'email',
            'password',
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'email' => [
                'bail', 'required', 'string', 'email', $this->validateAuthEmail(...),
            ],
            'password' => [
                'bail', 'required', 'string', $this->validateAuthPassword(...),
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        $messages = \__('login/validation.messages');

        if (\is_array($messages)) {
            return $messages;
        }

        return [];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        $attributes = \__('login/validation.attributes');

        if (\is_array($attributes)) {
            return $attributes;
        }

        return [];
    }

    /**
     * Get the user for which the authentication is being attempted.
     */
    public function getAuthUser(): ?User
    {
        return $this->authUser;
    }

    /**
     * Validate email.
     */
    private function validateAuthEmail(string $attribute, string $value, Closure $fail): void
    {
        $this->authUser = User::findByAuthEmail($value);

        if ($this->authUser === null) {
            $message = $this->validator->customMessages['email.exists'] ?? \__('validation.exists');
            $fail($message);
        }
    }

    /**
     * Validate password.
     */
    private function validateAuthPassword(string $attribute, string $value, Closure $fail): void
    {
        if ($this->authUser === null) {
            return;
        }

        $hasher = $this->container->make(Hasher::class);

        if (! $hasher->check($value, $this->authUser->getPassword())) {
            $message = $this->validator->customMessages['password.incorrect'] ?? \__('validation.current_password');
            $fail($message);
        }
    }

    /**
     * Determine if the user wants to set a "remember me" cookie.
     */
    public function shouldRemember(): bool
    {
        return $this->boolean('remember', false);
    }
}
