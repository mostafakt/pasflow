<?php

namespace App\Http\Resources\Quizes\Item;

use App\Http\Resources\Comments\Collection\LiteCommentsResourceCollection;
use App\Http\Resources\Questions\Collection\GeneralQuestionResourceCollection;
use App\Http\Resources\Questions\Collection\LiteQuestionResourceCollection;
use App\Http\Resources\Questions\Collection\QuestionResourceCollection;
use App\Http\Resources\Questions\Item\QuestionResource;
use App\Http\Resources\Users\Item\LiteUserResource;
use App\Http\Resources\Users\Item\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizesResource extends JsonResource
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
            'name' => $this->name,
            'category_id' => $this->category_id,
            'question_number' => $this->question_number,
            'questions' => new GeneralQuestionResourceCollection($this->quizQuestions),
        ];
    }
}
