<?php

declare(strict_types=1);

return [
    'messages' => [
        'email.email' => 'Wrong format :attribute.',
        'email.unique_user_email' => 'This :attribute is already registered.',
        'password.min' => ':Attribute must be at least :min characters long.',
        '*.required' => 'Enter :attribute.',
        '*.string' => 'The :attribute field has an invalid format.',
    ],

    'attributes' => [
        'email' => 'email',
        'password' => 'password',
    ],
];
