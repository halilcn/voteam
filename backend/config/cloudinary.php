<?php

return [

    'CLOUDINARY_CLOUD_NAME' => env('CLOUDINARY_CLOUD_NAME'),
    'BASE_URL' => env(
        'CLOUDINARY_BASE_URL',
        'http://res.cloudinary.com/'.env('CLOUDINARY_CLOUD_NAME')
    ),
    'CLOUDINARY_SECURE_URL' => env(
        'CLOUDINARY_SECURE_URL',
        'https://res.cloudinary.com/'.env('CLOUDINARY_CLOUD_NAME')
    ),
    'CLOUDINARY_API_BASE_URL' => env(
        'CLOUDINARY_API_BASE_URL',
        'https://api.cloudinary.com/v1_1/'.env('CLOUDINARY_CLOUD_NAME')
    ),
    'CLOUDINARY_API_KEY' => env('CLOUDINARY_API_KEY'),
    'CLOUDINARY_API_SECRET' => env('CLOUDINARY_API_SECRET'),
    'CLOUDINARY_VALIDATED_FOLDER_NAME' => [
        'vote-images'
    ]
];
