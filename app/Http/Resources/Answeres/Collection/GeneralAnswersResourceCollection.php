<?php

namespace App\Http\Resources\Answeres\Collection;

use App\Http\Resources\Answeres\Item\GeneralAnswersResource;
use App\Http\Resources\ApiResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GeneralAnswersResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource,GeneralAnswersResource::class);
    }
}
