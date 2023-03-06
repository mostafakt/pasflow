<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\Comments\Collection\CommentsResourceCollection;
use App\Http\Resources\Comments\Item\CommentsResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends ApiController
{
    public function __construct()
    {
        parent::__construct('comments', CommentsResourceCollection::class, CommentsResource::class, Comment::class);
    }

    public function getRequests(): array
    {
        $requests = [];
        $requests['index'] = IndexRequest::class;
        $requests['store'] = StoreCommentRequest::class;
        $requests['update'] = UpdateCommentRequest::class;
        $requests['show'] = Request::class;
        $requests['destroy'] = Request::class;
        return $requests;
    }

    public function setExtraFields($model)
    {
        $model->user_id = Auth::id();
    }
}
