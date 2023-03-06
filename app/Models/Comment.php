<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends SearchFilters
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = ['text', 'answer_id'];

    protected static $searchable = ['text'];
    protected static $filterable = ['answer_id', 'user_id'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function answer(): BelongsTo
    {
        return $this->belongsTo(Answer::class, 'answer_id', 'id');
    }

    public function isBelong($field, $userId): bool
    {
        return $this->$field === $userId;
    }
}
