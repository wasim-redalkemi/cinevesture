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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '404666548764-f1v2kr3th4ip21jkqgq2et4knrt7uau3.apps.googleusercontent.com', //USE FROM GOOGLE DEVELOPER ACCOUNT
        'client_secret' => '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', //USE FROM GOOGLE DEVELOPER ACCOUNT
        // 'redirect' => 'http://local.cinevesture.com/google/callback',
        'redirect' => 'https://app.cinevesture.com/google/callback'

    ],

];
