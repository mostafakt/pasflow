<?php

namespace App\Http\Resources\Users\Collection;

use App\Http\Resources\ApiResourceCollection;
use App\Http\Resources\Users\Item\GeneralUserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GeneralUsersResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource,GeneralUserResource::Class);
    }
}
