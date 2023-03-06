<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class SearchFilters extends Model
{
    protected static $filterable = [];
    protected static $searchable = [];
    protected static $extraObjectsneed = [];

    public static function getFilterable(): array
    {
        return static::$filterable;
    }

    public static function getSearchers(): array
    {
        return static::$searchable;
    }
}
