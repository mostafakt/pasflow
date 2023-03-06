<?php

namespace App\Http\Resources\Questions\Item;

use Illuminate\Http\Resources\Json\JsonResource;

class GeneralQuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'details' => $this->details,
            'votes' => $this->votes,
            'views' => $this->views,
            'closed' => $this->closed,
        ];
    }
}
