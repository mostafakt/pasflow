<?php

namespace App\Http\Resources\Comments\Item;

use App\Http\Resources\Answeres\Item\QuizesLiteResource;
use App\Http\Resources\Users\Item\LiteUserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'text'=>$this->text,
            'id'=>$this->id,
            'answer_id'=>$this->answer_id,
            'user_id'=>$this->user_id,
            'user'=>new LiteUserResource($this->user),
            'ansswer'=>new QuizesLiteResource($this->answer)
        ];
    }
}
