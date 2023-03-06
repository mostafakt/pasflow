<?php

namespace App\Http\Resources\Files\Collection;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Answeres\Item\QuizesLiteResource;
use App\Http\Resources\ApiResourceCollection;
use App\Http\Resources\Files\Item\FileResource;
use App\Http\Resources\Users\Item\LiteUserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FilesResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource,FileResource::Class);
    }
}
