<?php

namespace App\Http\Resources\Category\Collection;

use App\Http\Resources\ApiResourceCollection;
use App\Http\Resources\Category\Item\CategoryResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource,CategoryResource::Class);
    }
}
