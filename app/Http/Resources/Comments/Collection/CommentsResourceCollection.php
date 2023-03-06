<?php

namespace App\Http\Resources\Comments\Collection;

use App\Http\Resources\Answeres\Item\QuizesLiteResource;
use App\Http\Resources\ApiResourceCollection;
use App\Http\Resources\Comments\Item\CommentsResource;
use App\Http\Resources\Users\Item\LiteUserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentsResourceCollection extends ApiResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource,CommentsResource::Class);
    }
}
