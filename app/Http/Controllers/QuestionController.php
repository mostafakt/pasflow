<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Http\Resources\Questions\Collection\QuestionResourceCollection;
use App\Http\Resources\Questions\Item\QuestionResource;
use App\Models\Question;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends ApiController
{
    public function __construct()
    {
        parent::__construct('questions', QuestionResourceCollection::class, QuestionResource::class, Question::class);
    }

    public function getRequests(): array
    {
        $requests = [];
        $requests['index'] = IndexRequest::class;
        $requests['store'] = StoreQuestionRequest::class;
        $requests['update'] = UpdateQuestionRequest::class;
        $requests['show'] = Request::class;
        $requests['destroy'] = Request::class;
        return $requests;
    }

    public function setExtraFields($model)
    {
        $model->user_id = Auth::id();
    }

    public function fillterByIntid($quer, $value)
    {
        return $quer->whereHas('category', function (Builder $query) use ($value) {
            $query->where('interest_id', '=', $value);
        });
    }

    public function custumFileters($query, $request)
    {
        if ($request->input('interest_id', null) != null)
            return $this->fillterByIntid($query, $request->input('interest_id', null));
        return $query;
    }
}
