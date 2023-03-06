<?php

namespace App\Http\Resources\Questions\Item;

use App\Http\Resources\Answeres\Collection\LiteAnswersResourceCollection;
use App\Http\Resources\Answeres\Item\LiteAnswersResource;
use App\Http\Resources\Users\Item\LiteUserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        $arr = [
            'id' => $this->id,
            'title' => $this->title,
            'details' => $this->details,
            'votes' => $this->votes,
            'views' => $this->views,
            'closed' => $this->closed,
            'category_id' => $this->category_id,
            'user' => new LiteUserResource($this->user),
            'answers' => new LiteAnswersResourceCollection($this->answers),
        ];

        if (is_null($this->pivot))
            return $arr;

        $pivot = $this->pivot->toArray();

        if (array_key_exists('question_mark', $pivot))
            $arr['question_mark'] = $pivot['question_mark'];
        if (array_key_exists('quiz_id', $pivot))
            $arr['quiz_id'] = $pivot['quiz_id'];

        return $arr;
    }
}
