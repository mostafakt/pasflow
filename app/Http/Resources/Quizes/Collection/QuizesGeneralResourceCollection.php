<?php

namespace App\Http\Resources\Quizes\Collection;

use App\Http\Resources\Quizes\Item\QuizesGeneralResource;
use App\Http\Resources\ApiResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuizesGeneralResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource,QuizesGeneralResource::class);
    }
}
