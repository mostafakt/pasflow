<?php

namespace App\Http\Resources\Files\Item;

use App\Http\Resources\Answeres\Item\QuizesLiteResource;
use App\Http\Resources\Users\Item\LiteUserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
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
            'type' => $this->type,
            'user' => new LiteUserResource($this->user),
            'ansswer' => new QuizesLiteResource($this->answer)
        ];
    }
}
