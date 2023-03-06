<?php

namespace App\Http\Resources\QuizesPges\Collection;

use App\Http\Resources\QuizesPges\Item\QuizesPagesLiteResource;
use App\Http\Resources\ApiResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuizespagesLiteResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource, QuizesPagesLiteResource::class);
    }
}
