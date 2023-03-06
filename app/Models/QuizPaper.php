<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizPaper extends SearchFilters
{
    use HasFactory;

    protected static $searchable = ['automation_answer', 'question_mark'];
    protected static $filterable = ['quiz_id', 'question_id'];


    protected $table = 'quiz_questions';

    protected $fillable = ['automation_answer', 'question_mark', 'quiz_id', 'question_id'];

    public function paperAnswers()
    {
        return $this->belongsToMany(Answer::class, 'quiz_questions_answers', 'quiz_questions_id', 'answer_id');
    }

}
