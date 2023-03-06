<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'address',
        'position',
        'bio',
        'rule_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected static $filterable = [];
    protected static $searchable = ['first_name', 'last_name','fullName'];

    public static function getFilterable(): array
    {
        return static::$filterable;
    }

    public static function getSearchers(): array
    {
        return static::$searchable;
    }

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class, 'user_id', 'id');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'user_id', 'id');
    }

    public function generatedQuizzes()
    {
        return $this->hasMany(Quiz::class, 'creator_id', 'id');

    }

    public function Quizzes()
    {
        return $this->belongsToMany(Quiz::class, 'quiz_users', 'id', 'id',);

    }

    public function rule(): BelongsTo
    {
        return $this->belongsTo(Rule::class, 'rule_id', 'id');
    }

    public function isBelong($field, $userId): bool
    {
        return $this->$field === $userId;
    }

}
