<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HealthRes extends JsonResource
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
            'check_name' => $this->check_name,
            'check_label' => $this->check_label,
            'status' => $this->status,
            'short_summary' => $this->short_summary,
            'meta' => $this->meta,
            'ended_at' => $this->ended_at,
            'notification_message' => $this->notification_message,

        ];
    }
}
