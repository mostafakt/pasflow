<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Quiz extends SearchFilters
{
    use HasFactory;

    protected $table = 'quizzes';

    protected static $searchable = ['name'];
    protected static $filterable = ['category_id', 'question_number', 'final_mark', 'creator_id'];

    protected $fillable = [
        'name',
        'category_id',
        'question_number',
        'final_mark',
        'passed', 'creator_id',];

    public function quizQuestions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class, 'quiz_questions', 'quiz_id', 'question_id')
            ->withPivot(['question_mark', 'quiz_id']);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'quiz_users', 'quiz_id', 'user_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function isBelong($field, $userId): bool
    {
        return $this->$field === $userId;
    }


}
