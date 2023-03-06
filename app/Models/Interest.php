<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interest extends SearchFilters
{
    use HasFactory;

    protected $table = 'interests';
    protected $fillable = ['title'];

    protected static $searchable = ['title'];

    public function categorys()
    {
        $this->hasMany(Category::Class, 'interest_id', 'id');
    }

    public function isBelong($field, $userId): bool
    {
        return $this->$field === $userId;
    }
}
