<?php

namespace App\Http\Controllers\API\Other;

use App\Http\Controllers\Controller;
use App\Http\Requests\Other\FileRequest;
use App\Services\RemoteStorage;
use Cloudinary\Cloudinary;
use Illuminate\Http\Request;

class FileController extends Controller
{

    /**
     * @param  FileRequest  $request
     * @return object
     * @throws \Cloudinary\Api\Exception\ApiError
     */
    public function store(FileRequest $request): object
    {
        return (new RemoteStorage())->put($request->file('file'), $request->input('folder'));
    }
}
