<?php

namespace App\Http\Resources\Files\Collection;

use App\Http\Resources\ApiResourceCollection;
use App\Http\Resources\Files\Item\GeneralFileResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GeneralFilesResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource,GeneralFileResource::Class);
    }
}
