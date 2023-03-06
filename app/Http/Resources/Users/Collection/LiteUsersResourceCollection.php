<?php

namespace App\Http\Resources\Users\Collection;

use App\Http\Resources\ApiResourceCollection;
use App\Http\Resources\Users\Item\LiteUserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LiteUsersResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource,LiteUserResource::Class);
    }
}
