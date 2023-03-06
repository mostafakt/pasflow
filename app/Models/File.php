<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends SearchFilters
{
    use HasFactory;

    protected $table = 'files';
    protected $fillable = ['path', 'size', 'name', 'hash', 'type'];

    public function isBelong($field, $userId): bool
    {
        return $this->$field === $userId;
    }
}
