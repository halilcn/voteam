<?php

namespace App\Http\Controllers\API\Other;

use App\Http\Controllers\Controller;
use App\Http\Requests\Other\FileRequest;
use App\Services\RemoteStorage;
use App\Traits\Image;
use Cloudinary\Cloudinary;
use Illuminate\Http\Request;

class FileController extends Controller
{
    use Image;

    /**
     * @param  FileRequest  $request
     * @return object
     * @throws \Cloudinary\Api\Exception\ApiError
     */
    public function store(FileRequest $request): object
    {
        // return $this->convertImageToDefaultSettings($request->file('file')->getRealPath());
        //$file = $this->convertImageToDefaultSettings($request->file('file')->getRealPath());

        return (new RemoteStorage())->put($request->file('file'), $request->input('folder'));
    }
}
