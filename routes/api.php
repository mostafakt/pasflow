<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizeUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\testRes;
use App\Http\Resources\Quizes\Item\QuizesPagesResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'cors'], function () {
    Route::post('login', [UserController::class, 'login']);
    Route::post('register', [UserController::class, 'register']);

    #Route::get('Testres', [testRes::class, 'Retfullname']);
    Route::group(['middleware' => 'auth:api'], function () {
        Route::resource('/questions', QuestionController::class);
        Route::resource('/comment', CommentController::class);
        Route::resource('/quiz', QuizController::class);
        Route::post('/questions/{question}/vote', [QuestionController::class, 'vote']);

        Route::resource('/answers', AnswerController::class);
        Route::resource('/interests', InterestController::class);
        Route::resource('/categories', CategoryController::class);
        Route::resource('/users', UserController::class);

        Route::get('/profile', [UserController::class, 'profile']);
        Route::post('/logout', [UserController::class, 'logout']);

        // Route::post('/takequiz', [QuizController::class, 'takeQuiz']);
        //Route::post('/marker', [QuizController::class, 'check']);
    });
});
Route::group(['prefix' => 'zquiz', 'middleware' => 'auth:api'], function () {

    // Route::resource('', QuizController::class);
    Route::resource('user', QuizeUserController::class);

    Route::post('take', [QuizController::class, 'takeQuiz']);
    Route::post('marker', [QuizController::class, 'check']);
});

############# test ################
#Route::get('hii', [\App\Http\Controllers\AuthTest::class, 'adds']);
