<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\Http\Requests\Interest\StoreInterestRequest;
use App\Http\Requests\Interest\UpdateInterestRequest;
use App\Http\Resources\Interest\Collection\InterestResourceCollection;
use App\Http\Resources\Interest\Item\InterestResource;
use App\Models\Interest;
use Illuminate\Http\Request;

class InterestController extends ApiController
{

    public function __construct()
    {
        parent::__construct('interests', InterestResourceCollection::class, InterestResource::class, Interest::class);
    }

    public function getRequests(): array
    {
        $requests = [];
        $requests['index'] = IndexRequest::class;
        $requests['store'] = StoreInterestRequest::class;
        $requests['update'] = UpdateInterestRequest::class;
        $requests['show'] = Request::class;
        $requests['destroy'] = Request::class;
        return $requests;
    }
}
