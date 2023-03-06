<?php

namespace App\Http\Resources\QuizesPges\Item;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizesPagesLiteResource extends JsonResource
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
