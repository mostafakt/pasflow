<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends SearchFilters
{
    use HasFactory;

    protected $table = 'questions';
    protected $fillable = ['title', 'details', 'category_id'];

    protected static $searchable = ['title', 'details'];
    protected static $filterable = ["user_id", "category_id"];


    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }

    public function votes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'question_vote', 'question_id', 'user_id');
    }

    public function views(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'question_view');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function isBelong($field, $userId): bool
    {
        return $this->$field === $userId;
    }
}
