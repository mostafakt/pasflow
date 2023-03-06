<?php

namespace App\Http\Resources\Answeres\Collection;

use App\Http\Resources\Answeres\Item\LiteAnswersResource;
use App\Http\Resources\ApiResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LiteAnswersResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource,LiteAnswersResource::class);
    }
}
