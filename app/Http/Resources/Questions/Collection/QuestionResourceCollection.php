<?php

namespace App\Http\Resources\Questions\Collection;

use App\Http\Resources\ApiResourceCollection;
use App\Http\Resources\Questions\Item\QuestionResource;
use App\Http\Resources\Users\Item\LiteUserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuestionResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource,QuestionResource::Class);
    }
}
