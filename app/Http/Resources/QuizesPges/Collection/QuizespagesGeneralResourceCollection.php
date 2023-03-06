<?php

namespace App\Http\Resources\QuizesPges\Collection;

use App\Http\Resources\QuizesPges\Item\QuizesPagesGeneralResource;
use App\Http\Resources\ApiResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuizespagesGeneralResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource,QuizesPagesGeneralResource::class);
    }
}
