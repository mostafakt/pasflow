<?php

namespace App\Http\Resources\QuizUser\Item;

use App\Http\Resources\Questions\Item\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizUserResource extends JsonResource
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
            'question_id'=>$this->user_id,
        ];
    }

}
