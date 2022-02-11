<?php
// config for IdentityPass/IdentityPass
return [

    'keys' => [
        'default' => [

            'test_secret_key' => env('TEST_SECRET_KEY'),

            'test_public_key' => env('TEST_PUBLIC_KEY'),

            'live_public_key' => env('LIVE_PUBLIC_KEY'),

            'live_secret_key' => env('LIVE_SECRET_KEY'),

        ],
    ],


];
