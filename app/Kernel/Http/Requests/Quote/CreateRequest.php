<?php

declare(strict_types=1);

namespace App\Kernel\Http\Requests\Quote;

use App\Rules\UniqueQuote;
use Illuminate\Foundation\Http\FormRequest;

abstract class CreateRequest extends FormRequest
{
    /**
     * Get data to be validated from the request.
     */
    public function validationData(): array
    {
        return $this->only(['text']);
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'text' => [
                'bail', 'required', 'string', $this->uniqueRule(),
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        $messages = \__('quote/validation.messages');

        if (\is_array($messages)) {
            return $messages;
        }

        return [];
    }

    /**
     * Build "unique" rule.
     */
    protected function uniqueRule(): UniqueQuote
    {
        return (new UniqueQuote())
            ->message('text.unique');
    }
}
