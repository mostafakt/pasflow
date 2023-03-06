<?php

namespace App\Http\Resources\Comments\Collection;

use App\Http\Resources\ApiResourceCollection;
use App\Http\Resources\Comments\Item\LiteCommentsResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LiteCommentsResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource,LiteCommentsResource::class);
    }

}
