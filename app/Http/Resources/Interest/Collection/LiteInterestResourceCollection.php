<?php

namespace App\Http\Resources\Interest\Collection;

use App\Http\Resources\ApiResourceCollection;
use App\Http\Resources\Interest\Item\LiteInterestResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LiteInterestResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource,LiteInterestResource::Class);
    }
}
