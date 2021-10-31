<?php

namespace App\Services;

use Cloudinary\Cloudinary;

class RemoteStorage
{
    public Cloudinary $cloudinary;

    public function __construct()
    {
        // TODO: Will be removed from here
        $this->cloudinary = new Cloudinary(
            [
                'cloud' => [
                    'cloud_name' => config('cloudinary.CLOUDINARY_CLOUD_NAME'),
                    'api_key' => config('cloudinary.CLOUDINARY_API_KEY'),
                    'api_secret' => config('cloudinary.CLOUDINARY_API_SECRET'),
                ],
                'url' => [
                    'secure' => true
                ]
            ]
        );
    }

    /**
     * @param  string  $file
     * @param  string  $folder
     * @return object
     * @throws \Cloudinary\Api\Exception\ApiError
     */
    public function put(string $file, string $folder): object
    {
        $file = $this->cloudinary->uploadApi()->upload($file, [
            'folder' => $folder,
            'quality' => 'auto'
        ]);

        return collect($file)->only('public_id', 'secure_url');
    }
}
