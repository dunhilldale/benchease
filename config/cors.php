<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => [
        '*',
        'api/v1/*',
        'oauth/*',
        'sanctum/csrf-cookie'
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'http://127.0.0.1:8180',
        'http://127.0.0.1:3000',
        'https://dunhilldale.com',
        'https://brm.kierquebral.com',
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => [
        '*',
        'X-Requested-With',
        'Content-Type',
        'X-Token-Auth',
        'X-Custom-Header',
        'Authorization',
        'Upgrade-Insecure-Requests',
    ],

    'exposed_headers' => [],

    'max_age' => 86400,

    'supports_credentials' => true,

];
