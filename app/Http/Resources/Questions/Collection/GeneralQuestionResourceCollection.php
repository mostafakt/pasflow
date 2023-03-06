<?php

namespace App\Http\Resources\Questions\Collection;

use App\Http\Resources\ApiResourceCollection;
use App\Http\Resources\Questions\Item\GeneralQuestionResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GeneralQuestionResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource,GeneralQuestionResource::class);
    }
}
