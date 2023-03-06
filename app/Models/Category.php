<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends SearchFilters
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['title', 'icon', 'interest_id'];

    protected static $filterable = ['title', 'interest_id'];
    protected static $searchable = ['title'];

    public function interest()
    {
        $this->belongsTo(Interest::Class, 'interest_id', 'id');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'category_id', 'id');
    }

    public function isBelong($field, $userId): bool
    {
        return $this->$field === $userId;
    }
}
