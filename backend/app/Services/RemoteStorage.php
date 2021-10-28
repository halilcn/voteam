<?php

namespace App\Services;

use Cloudinary\Cloudinary;

class RemoteStorage
{
    public $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
                                               'cloud' => [
                                                   'cloud_name' => config('cloudinary.cloudName'),
                                                   'api_key' => config('cloudinary.apiKey'),
                                                   'api_secret' => config('cloudinary.apiSecret'),
                                               ],
                                               /*'url' => [
                                                   'secure' => true
                                               ]*/
                                           ]);
    }

    public function put(string $file, array $options = []): object
    {
        return $this->cloudinary->uploadApi()->upload($file, $options);
    }
}
