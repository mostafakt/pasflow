<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use App\Http\Resources\Answeres\Collection\AnswersResourceCollection;
use App\Http\Resources\Answeres\Item\AnswersResource;
use App\Models\Answer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends ApiController
{
    public function __construct()
    {
        parent::__construct('answers', AnswersResourceCollection::class, AnswersResource::class, Answer::class);
    }

    public function getRequests(): array
    {
        $requests = [];
        $requests['index'] = IndexRequest::class;
        $requests['store'] = StoreAnswerRequest::class;
        $requests['update'] = UpdateAnswerRequest::class;
        $requests['show'] = Request::class;
        $requests['destroy'] = Request::class;
        return $requests;
    }

    public function setExtraFields($model)
    {
        $model->user_id = Auth::id();
    }


    public function fillterByCatId($quer, $value)
    {
        return $quer->whereHas('question', function (Builder $query) use ($value) {
            $query->where('category_id', '=', $value);
        });
    }

    public function custumFileters($query, $request)
    {
        return $this->fillterByCatId($query, $request->input('category_id', null));
    }

}
