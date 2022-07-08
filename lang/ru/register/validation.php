<?php

declare(strict_types=1);

return [
    'messages' => [
        'email.email' => 'Неправильный формат :attribute.',
        'email.unique_user_email' => 'Такой :attribute уже зарегистрирован.',
        'password.min' => ':Attribute должен состоять минимум из :min символов.',
        '*.required' => 'Введите :attribute.',
        '*.string' => 'Поле :attribute имеет недопустимый формат.',
    ],

    'attributes' => [
        'email' => 'email',
        'password' => 'пароль',
    ],
];
