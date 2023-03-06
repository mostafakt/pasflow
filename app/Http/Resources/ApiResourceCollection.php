<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ApiResourceCollection extends ResourceCollection
{
    protected $itemResource;

    public function __construct($resource, $itemRes)
    {
        $this->itemResource = $itemRes;
        parent::__construct($resource);
    }

    public function toArray($request): \Illuminate\Support\Collection
    {
        $re= $this->collection->map(function ($item) {
            return new $this->itemResource($item);
        });
        return $re;
    }

}
