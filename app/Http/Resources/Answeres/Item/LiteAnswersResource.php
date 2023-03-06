<?php

namespace App\Http\Resources\Answeres\Item;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LiteAnswersResource extends JsonResource
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
            'accepted' => $this->accepted,
            'user_id' => $this->user_id,
            'question_id' => $this->question_id,
        ];
    }
}
