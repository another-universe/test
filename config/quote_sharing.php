<?php

declare(strict_types=1);

return [
    'default' => 'email',

    'drivers' => [
        'email' => [
            'class' => App\Services\QuoteSharing\EmailDriver::class,
            // Other configuration...
        ],

        'telegram' => [
            'class' => App\Services\QuoteSharing\TelegramDriver::class,
            // Other configuration...
        ],

        'viber' => [
            'class' => App\Services\QuoteSharing\ViberDriver::class,
            // Other configuration...
        ],
    ],
];
