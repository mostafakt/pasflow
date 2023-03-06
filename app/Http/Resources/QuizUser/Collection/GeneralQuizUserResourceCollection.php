<?php

namespace App\Http\Resources\QuizUser\Collection;

//use App\Http\Resources\Answeres\Item\AnswersResource;
use App\Http\Resources\ApiResourceCollection;
use App\Http\Resources\Comments\Collection\LiteCommentsResourceCollection;
use App\Http\Resources\QuizUser\Item\GeneralQuizUserResource;
use App\Http\Resources\QuizUser\Item\QuizUserResource;
use App\Http\Resources\Users\Item\LiteUserResource;
use App\Http\Resources\Users\Item\UserResource;
use App\Http\Resources\QuizesPges\Item\QuizesPagesResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GeneralQuizUserResourceCollection extends ApiResourceCollection
{
   public function __construct($resource)
   {
       parent::__construct($resource,GeneralQuizUserResource::class);
   }
}
