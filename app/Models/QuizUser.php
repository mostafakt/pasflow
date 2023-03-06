<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizUser extends SearchFilters
{
    use HasFactory;

    protected $table = 'quiz_users';
    protected $fillable = ['user_id', 'quiz_id', 'quiz_mark'];

    protected static $filterable = ['user_id', 'quiz_id'];
    protected static $searchable = ['quiz_mark'];

    public function quizes()
    {
        $this->belongsToMany(Quiz::class, 'quiz_users', 'quiz_id', 'user_id');
    }


}
