<?php

namespace App\Http\Resources\Users\Item;

use App\Http\Resources\Comments\Collection\LiteCommentsResourceCollection;
use App\Http\Resources\Questions\Collection\LiteQuestionResourceCollection;
use App\Http\Resources\Quizes\Collection\QuizesLiteResourceCollection;
use App\Http\Resources\Quizes\Collection\QuizesResourceCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->full_name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'rule'=>$this->rule,
            'questions' => new LiteQuestionResourceCollection($this->questions),
            'comments' => new LiteCommentsResourceCollection($this->comments),
            'answers' => new QuizesResourceCollection($this->answers),
        ];
    }
}
