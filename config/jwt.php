<?php

return [
    'salt' => env('JWT_SALT', 'secret'),
    'token_ttl' => env('JWT_TOKEN_TTL', 60 * 60 * 24 * 3), // 3 days
    'refresh_ttl' => env('JWT_REFRESH_TTL', 60 * 60 * 24 * 10) // 10 days
];
