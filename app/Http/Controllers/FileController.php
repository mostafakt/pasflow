<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Http\Resources\Files\Collection\FilesResourceCollection;
use App\Http\Resources\Files\Item\FileResource;
use App\Models\File;
use Illuminate\Http\Request;

class FileController extends ApiController
{
    public function __construct()
    {
        parent::__construct('files', FilesResourceCollection::class, FileResource::class, File::class);
    }

    public function getRequests(): array
    {
        $requests = [];
        $requests['index'] = IndexRequest::class;
        $requests['store'] = StoreFileRequest::class;
        $requests['update'] = UpdateFileRequest::class;
        $requests['show'] = Request::class;
        $requests['destroy'] = Request::class;
        return $requests;
    }
}
