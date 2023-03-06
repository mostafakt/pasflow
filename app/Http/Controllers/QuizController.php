<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddQuizRequest;
use App\Http\Requests\CheckRequest;
use App\Http\Requests\IndexRequest;
use App\Http\Requests\Interest\StoreInterestRequest;
use App\Http\Requests\Interest\UpdateInterestRequest;
use App\Http\Requests\TakeQuizRequest;
use App\Http\Resources\Questions\Collection\QuestionResourceCollection;
use App\Http\Resources\Questions\Item\QuestionResource;
use App\Http\Resources\Quizes\Collection\QuizesPagesResourceCollection;
use App\Http\Resources\Quizes\Collection\QuizesResourceCollection;
use App\Http\Resources\Quizes\Item\QuizesPagesResource;
use App\Http\Resources\Quizes\Item\QuizesResource;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizPaper;
use App\Models\QuizPaperAnswer;
use App\Models\QuizUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends ApiController
{

    //  add esam
    // answer
    // cheack
    //predect quest


    public function __construct()
    {
        parent::__construct('quizzes', QuizesResourceCollection::class, QuizesResource::class, Quiz::class);
    }

    public function getRequests(): array
    {
        $requests = [];
        $requests['index'] = IndexRequest::class;
        $requests['store'] = AddQuizRequest::class;
        $requests['update'] = Request::class;
        $requests['show'] = Request::class;
        $requests['destroy'] = Request::class;
        return $requests;
    }

//    public function store(Request $request): \Illuminate\Http\JsonResponse
//    {
//        $this->validateRequest($request, $this->storeRequest);
//
//        $element = new $this->model($request->all());
//        $this->setExtraFields($element);
//        $element->save();
//
//        $questions = $request->input('questions');
//
//        foreach ($questions as $question) {
//            $question = new Question($question);
//            $question->user_id = Auth::id();
//            $element->quizQuestions()->save($question);
//        }
//
//        return $this->response($element);
//    }


    public function setExtraFields($model)
    {
        $model->creator_id = Auth::id();
    }

    public function setMinExtraFields($model)
    {
        $model->user_id = Auth::id();
        return $model;
    }

    public function takeQuiz(TakeQuizRequest $request): JsonResponse
    {
        $userQuiz = QuizUser::create([
            "user_id" => Auth::id(),
            "quiz_id" => $request->Input('quiz_id'),
        ]);

        $answers = $request->input('answers');

        for ($i = 0; $i < count($answers); $i++) {
            $quizpaper = QuizPaper::query()
                ->where('quiz_id', $request->Input('quiz_id'))
                ->where('question_id', $answers[$i]['question_id'])
                ->first();

            $answer = new Answer($answers[$i]);
            $answer->user_id = Auth::id();

            $quizpaper->paperAnswers()->save($answer);
        }

        $ret = $quizpaper->paperAnswers;
        return $this->response($ret);
    }


    public function check(CheckRequest $request): JsonResponse
    {
        $answers = $request->input('answers');

        for ($i = 0; $i < count($answers); $i++) {
            $question_id = Answer::query()->find($answers[$i]['id'])->question_id;

            $quizpaper = QuizPaper::query()
                ->where('quiz_id', $request->Input('quiz_id'))
                ->where('question_id', "=", $question_id)
                ->first();


            $quizPaperAnswers = QuizPaperAnswer::query()
                ->where('quiz_questions_id', '=', $quizpaper->id)
                ->where('answer_id', '=', $answers[$i]['id'])
                ->first();


            $quizPaperAnswers->answer_mark = $answers[$i]['mark'];
            $quizPaperAnswers->save();
        }

        $answer = QuizPaperAnswer::query();
        $answer = $answer->get();

        return $this->response($answer);
    }


}
