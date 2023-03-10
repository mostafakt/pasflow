<?php

namespace App\Http\Resources\Quizes\Item;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizesLiteResource extends JsonResource
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


        ];
    }
}
