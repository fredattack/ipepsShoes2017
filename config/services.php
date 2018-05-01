<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
        'client_id' => '119653015860-qvh6hin20kehmfgot8sokf1fpir5il4b.apps.googleusercontent.com',
        'client_secret' => 'AfoVjF1jYDAIoqUrwHgEzOaM',
        'redirect' => 'http://ipepsshoes2017.dev/login/google/callback',
    ],

    'facebook' => [
        'client_id' => '327733841033824',
        'client_secret' => '4a6cfee5967bd5d5a548a09348fc090b',
        'redirect' => 'http://ipepsshoes2017.dev/login/facebook/callback',
    ],

    'twitter' => [
        'client_id' => 'your-facebook-app-id',
        'client_secret' => 'your-facebook-app-secret',
        'redirect' => 'http://your-callback-url',
    ],
//    'paypal' => [
//        'client_id' => 'AR9fdEaUfnkuKNji2itrCyAVzRhBDU8XPIr01nMd3gIR76Va4w5ZMdo5d1pIVpulE53iBls_U_PzykEG',
//        'secret' => 'EE24MVMtKg0dKP3ryC-L19B2ujW0dt-aFUghVp72i-NPtyhfJYW0dKtyDos7tlunD9bg0qTc9-qrPCCT'
//    ],
    

];
