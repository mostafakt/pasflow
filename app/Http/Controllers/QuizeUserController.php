<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuizUser\Collection\QuizUserResourceCollection;
use App\Http\Resources\QuizUser\Item\QuizUserResource;
use App\Models\QuizUser;
use Illuminate\Http\Request;

class QuizeUserController extends ApiController
{
    public function __construct()
    {
        parent::__construct('quiz_user',  QuizUserResourceCollection::class, QuizUserResource::class, QuizUser::class);
    }

    public function getRequests(): array
    {
        $requests = [];
        $requests['index'] = Request::class;
        $requests['store'] = Request::class;
        $requests['update'] = Request::class;
        $requests['show'] = Request::class;
        $requests['destroy'] = Request::class;
        return $requests;
    }



}
