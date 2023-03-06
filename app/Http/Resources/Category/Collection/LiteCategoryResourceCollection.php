<?php

namespace App\Http\Resources\Category\Collection;

use App\Http\Resources\ApiResourceCollection;
use App\Http\Resources\Category\Item\CategoryResource;
use App\Http\Resources\Category\Item\CategoryResourceLite;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LiteCategoryResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource,CategoryResourceLite::Class);
    }
}
