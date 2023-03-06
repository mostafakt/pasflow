<?php

namespace App\Http\Resources\Questions\Collection;

use App\Http\Resources\ApiResourceCollection;
use App\Http\Resources\Questions\Item\LiteQuestionResource;
use App\Http\Resources\Questions\Item\QuestionResource;

class LiteQuestionResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource, LiteQuestionResource::Class);
    }
}
