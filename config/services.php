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

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
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

    'openai' => [
        'api_key' => env('OPENAI_API_KEY'),
        'model' => env('OPENAI_MODEL', 'gpt-4.1'),
    ],

    'crm_bot' => [
        'token' => env('CRM_BOT_API_TOKEN'),
    ],

    'lead_notifications' => [
        'to' => env('LEAD_NOTIFICATION_EMAIL', 'javier.sanchezjps27@gmail.com'),
    ],

    'cloudinary' => [
        'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
        'api_key' => env('CLOUDINARY_API_KEY'),
        'api_secret' => env('CLOUDINARY_API_SECRET'),
        'demo_folder' => env('CLOUDINARY_DEMO_FOLDER', 'oraleweb/demos'),
        'profile_folder' => env('CLOUDINARY_PROFILE_FOLDER', 'oraleweb/profiles'),
        'blog_folder' => env('CLOUDINARY_BLOG_FOLDER', 'oraleweb/blog'),
        'verify_ssl' => env('CLOUDINARY_VERIFY_SSL', true),
    ],

];
