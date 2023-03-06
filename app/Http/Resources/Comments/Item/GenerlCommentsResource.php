<?php

namespace App\Http\Resources\Comments\Item;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GenerlCommentsResource extends JsonResource
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
        ];
    }
}
