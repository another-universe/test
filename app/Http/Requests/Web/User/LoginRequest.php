<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\User;

use App\Kernel\Http\Requests\User\LoginRequest as FormRequest;

final class LoginRequest extends FormRequest
{
    /**
     * Determine if the user wants to set a "remember me" cookie.
     */
    public function shouldRemember(): bool
    {
        return $this->boolean('remember', false);
    }
}
