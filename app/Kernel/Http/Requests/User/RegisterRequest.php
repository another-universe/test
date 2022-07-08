<?php

declare(strict_types=1);

namespace App\Kernel\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

abstract class RegisterRequest extends FormRequest
{
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
                'bail', 'required', 'string', 'email', 'unique_user_email',
            ],
            'password' => [
                'bail', 'required', 'string', 'min:8',
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        $messages = \__('register/validation.messages');

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
        $attributes = \__('register/validation.attributes');

        if (\is_array($attributes)) {
            return $attributes;
        }

        return [];
    }
}
