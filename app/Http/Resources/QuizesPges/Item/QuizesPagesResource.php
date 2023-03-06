<?php

namespace App\Http\Resources\QuizesPges\Item;

use App\Http\Resources\Comments\Collection\LiteCommentsResourceCollection;
use App\Http\Resources\Questions\Collection\LiteQuestionResourceCollection;
use App\Http\Resources\Questions\Item\QuestionResource;
use App\Http\Resources\Users\Item\LiteUserResource;
use App\Http\Resources\Users\Item\UserResource;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizesPagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'quiz_id'=>$this->quiz_id,
            'question_id'=>$this->question_id,
            'question'=>new QuestionResource(Question::find($this->question_id))
        ];
    }

}
