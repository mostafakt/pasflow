<?php

namespace App\Http\Resources\Quizes\Collection;

use App\Http\Resources\Quizes\Item\QuizesLiteResource;
use App\Http\Resources\ApiResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuizesLiteResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource, QuizesLiteResource::class);
    }
}
