<?php

namespace App\Http\Resources\Answeres\Item;

use App\Http\Resources\Comments\Collection\LiteCommentsResourceCollection;
use App\Http\Resources\Users\Item\LiteUserResource;
use App\Http\Resources\Users\Item\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnswersResource extends JsonResource
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
            'text' => $this->text,
            'votes' => $this->votes,
            'accepted' => $this->accepted,
            'user_id' => $this->user_id,
            'question_id' => $this->question_id,
            'user' => new LiteUserResource($this->user),
            'comments'=>new LiteCommentsResourceCollection($this->comments),

        ];
    }
}
