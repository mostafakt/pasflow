<?php

namespace App\Http\Resources\Files\Collection;

use App\Http\Resources\ApiResourceCollection;
use App\Http\Resources\Files\Item\LiteFileResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LiteFilesResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource,LiteFileResource::Class);
    }
}
