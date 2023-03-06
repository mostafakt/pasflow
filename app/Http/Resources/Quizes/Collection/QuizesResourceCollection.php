<?php

namespace App\Http\Resources\Quizes\Collection;

use App\Http\Resources\ApiResourceCollection;
use App\Http\Resources\Quizes\Item\QuizesResource;

class QuizesResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource, QuizesResource::class);
    }
}
