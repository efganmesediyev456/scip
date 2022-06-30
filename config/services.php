<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'recaptcha' => [
        'secret' => env('RECAPTCHA_SECRET'),
        'threshold' => (float)env('RECAPTCHA_THRESHOLD', 0.5)
    ],

    'pashabank' => [
        'merchant_url' => env('PASHABANK_MERCHANT_URL'),
        'client_url' => env('PASHABANK_CLIENT_URL'),
        'merchant_id' => env("PASHABANK_MERCHANT_ID"),
        'certificate' => env('PASHABANK_CERT'),
        'key' => env('PASHABANK_KEY'),
        'password' => env('PASHABANK_PASSWORD')
    ],

    'kapitalbank' => [
        // https://pg.kapitalbank.az/docs
        'merchant_id' => env('KB_MERCHANT_ID', null),
        'base_url' => env('KB_MERCHANT_URL'),
        'client_url' => env('KB_CLIENT_URL'),
    ],

    'poctgoyercini' => [
        // https://www.poctgoyercini.com/api_json/swagger/ui/index
        'base_url' => env('POCT_GOYERCHINI_BASE_URL'),
        'username' => env('POCT_GOYERCHINI_USERNAME'),
        'password' => env('POCT_GOYERCHINI_PASSWORD'),
    ]
];
