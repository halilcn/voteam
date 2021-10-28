<?php

return [

    'cloudName' => env('CLOUDINARY_CLOUD_NAME'),
    'baseUrl' => env('CLOUDINARY_BASE_URL', 'http://res.cloudinary.com/'.env('CLOUDINARY_CLOUD_NAME')),
    'secureUrl' => env('CLOUDINARY_SECURE_URL', 'https://res.cloudinary.com/'.env('CLOUDINARY_CLOUD_NAME')),
    'apiBaseUrl' => env('CLOUDINARY_API_BASE_URL', 'https://api.cloudinary.com/v1_1/'.env('CLOUDINARY_CLOUD_NAME')),
    'apiKey' => env('CLOUDINARY_API_KEY'),
    'apiSecret' => env('CLOUDINARY_API_SECRET'),
];
