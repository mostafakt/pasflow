<?php

namespace App\Http\Resources\Users\Collection;

use App\Http\Resources\ApiResourceCollection;
use App\Http\Resources\Users\Item\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UsersResourceCollection extends ApiResourceCollection
{
    public function __construct( $resource)
    {
        parent::__construct($resource,UserResource::Class);
    }
}
