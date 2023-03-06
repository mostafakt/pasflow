<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Answer extends SearchFilters
{
    use HasFactory;

    protected $fillable = ['id', 'question_id', 'text'];

    protected static $searchable = ['text'];
    protected static $filterable = ['user_id', 'question_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::Class, 'question_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'answer_id', 'id');
    }

    public function votes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'answer_vote');
    }

    public function views(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'answer_view');
    }

    public function paperAnswers()
    {
        $this->belongsToMany(QuizPaper::class, 'quiz_questions_answers', 'answer_id', 'quiz_paper_id');
    }

    public function isBelong($field, $userId): bool
    {
        return $this->$field === $userId;
    }

}
