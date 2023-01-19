<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'details', 'category_id', 'user_id'];

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }

    public function votes()
    {
        return $this->belongsToMany(User::class, 'question_vote', 'question_id', 'user_id');
    }

    public function views()
    {
        return $this->belongsToMany(User::class, 'question_view');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
