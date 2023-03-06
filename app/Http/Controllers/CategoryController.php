<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\Category\Collection\CategoryResourceCollection;
use App\Http\Resources\Category\Item\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

//use App\Http\Resources\CategoryResource;

class CategoryController extends ApiController
{
    public function __construct()
    {
        parent::__construct('categories', CategoryResourceCollection::class, CategoryResource::class, Category::class);
    }

    public function getRequests(): array
    {
        $requests = [];
        $requests['index'] = IndexRequest::class;
        $requests['store'] = StoreCategoryRequest::class;
        $requests['update'] = UpdateCategoryRequest::class;
        $requests['show'] = Request::class;
        $requests['destroy'] = Request::class;
        return $requests;
    }
}
