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
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '177934716385195',
        'client_secret' => '4ba7400d0ded174fc41b9cb43245309c',
        'redirect' => 'https://thegotest.co.za/auth/facebook/callback',
    ],
    'twitter' => [
        'client_id' => 'Rt5PeBiEJeUlRV6UQsb3CBNoc',
        'client_secret' => '996mnKFZnpRYyR711Tx9TrFZMankTCNCqHQrEAsSrvjGe11ZLM',
        'redirect' => 'https://www.thegotest.co.za/auth/twitter/callback',
    ],
    'google' => [
        'client_id' => '666023223872-alo4bnn4m3196eiv73dfje8bbn8lgna0.apps.googleusercontent.com',
        'client_secret' => '2ka0O-MUgRVFv5a6aHdKhsTQ',
        'redirect' => 'https://www.thegotest.co.za/auth/google/callback',
    ],

];
