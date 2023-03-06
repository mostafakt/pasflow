<?php

namespace App\Http\Resources\Comments\Collection;

use App\Http\Resources\ApiResourceCollection;
use App\Http\Resources\Comments\Item\GenerlCommentsResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GeneralCommentsResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource,GenerlCommentsResource::Class);
    }
}
