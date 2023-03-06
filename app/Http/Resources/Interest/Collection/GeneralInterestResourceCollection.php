<?php

namespace App\Http\Resources\Interest\Collection;

use App\Http\Resources\ApiResourceCollection;
use App\Http\Resources\Interest\Item\GeneralInterestResource;
use App\Http\Resources\Interest\Item\InterestResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GeneralInterestResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource,GeneralInterestResource::Class);
    }
}
