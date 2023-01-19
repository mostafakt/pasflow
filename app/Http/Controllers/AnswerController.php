<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class AnswerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers = Answer::query()->with('user');
        return $this->paginate($answers);
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
     * @param \App\Http\Requests\StoreAnswerRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnswerRequest $request)
    {
        $answer = new Answer($request->all());
        $answer->user_id = Auth::id();
        $answer->save();

        return $this->response($answer);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Answer $answer
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Answer $answer
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateAnswerRequest $request
     * @param \App\Models\Answer $answer
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnswerRequest $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Answer $answer
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }


    public function vote(Answer $answer)
    {
        if ($answer == null)
            return $this->response404();

        $answer->votes()->syncWithoutDetaching([Auth::id() => ["updated_at" => date('Y-m-d')]]);
        $answer->votes = $answer->votes()->count();
        $answer->push();

        return $this->response($answer);
    }
}
