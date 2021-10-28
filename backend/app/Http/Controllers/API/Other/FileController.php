<?php

namespace App\Http\Controllers\API\Other;

use App\Http\Controllers\Controller;
use App\Http\Requests\Other\FileRequest;
use App\Services\RemoteStorage;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function store(FileRequest $request)
    {
        return (new RemoteStorage())->put($request->file('file'));
    }
}
