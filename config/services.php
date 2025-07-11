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

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID', '98353567446-eck4u02sg9rma1ksss3f10sql6a3efe5.apps.googleusercontent.com'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET', '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'),
        'redirect' => env('GOOGLE_REDIRECT_URI', 'http://localhost:8000/admin/auth/google/callback'),
    ],

    'app' => [
        'production_url' => env('APP_PRODUCTION_URL', 'https://cread.org.pe'),
        'admin_dashboard_url' => env('ADMIN_DASHBOARD_URL', '/admin/dashboard'),
        'admin_login_url' => env('ADMIN_LOGIN_URL', '/admin/login'),
    ],

    'openai' => [
        'api_key' => env('OPENAI_API_KEY'),
    ],

];
