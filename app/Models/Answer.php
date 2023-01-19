<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['question_id', 'text'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'answer_id', 'id');
    }


    public function votes()
    {
        return $this->belongsToMany(User::class, 'answer_vote');
    }

    public function views()
    {
        return $this->belongsToMany(User::class, 'answer_view');
    }

}
