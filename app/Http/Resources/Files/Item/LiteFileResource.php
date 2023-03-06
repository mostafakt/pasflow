<?php

namespace App\Http\Resources\Files\Item;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LiteFileResource extends JsonResource
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
            'path' => $this->path,
            'type' => $this->type
        ];
    }
}
