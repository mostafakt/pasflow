<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class QuestionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::query()->orderByDesc('created_at')->with('user')->withCount(['answers', 'views', 'votes']);
        return $this->paginate($questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreQuestionRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request)
    {
        $question = new Question($request->all());
        $question->user_id = Auth::id();
        $question->save();

        return $this->response($question);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Question $question
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        if ($question == null) {
            return $this->response404();
        }

        $question->views()->syncWithoutDetaching([Auth::id() => ["updated_at" => date('Y-m-d')]]);
        $question->views = $question->views()->count();
        $question->push();

        return $this->response($question->load([
            'user',
            'answers',
            'answers.comments',
            'answers.comments.user',
            'answers.user',
        ]));
    }

    public function vote(Question $question)
    {
        if ($question == null) {
            return $this->response404();
        }

        $question->votes()->syncWithoutDetaching([Auth::id() => ["updated_at" => date('Y-m-d')]]);
        $question->votes = $question->votes()->count();
        $question->push();

        return $this->response($question->load([
            'user',
            'answers',
            'answers.comments',
            'answers.comments.user',
            'answers.user',
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Question $question
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateQuestionRequest $request
     * @param \App\Models\Question $question
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Question $question
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
