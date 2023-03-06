<?php

namespace App\Http\Resources\Category\Collection;

use App\Http\Resources\ApiResourceCollection;
use App\Http\Resources\Category\Item\CategoryResourceGeneral;
use App\Http\Resources\Category\Item\CategoryResourceLite;
use Illuminate\Http\Resources\Json\ResourceCollection;

class  GeneralCategoryResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource,CategoryResourceGeneral::Class);
    }
}
