<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizPaperAnswer extends SearchFilters
{
    use HasFactory;

    protected $table = 'quiz_questions_answers';
    protected $fillable = ['quiz_questions_id', 'answer_id', 'answer_mark'];

    protected static $searchable = [];
    protected static $filterable = ['quiz_questions_id', 'answer_id', 'answer_mark'];



}
