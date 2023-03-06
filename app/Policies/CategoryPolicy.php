<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy extends ApiPolicy
{
    use HandlesAuthorization;

    public function getFullArrays(): array
    {
        $arrays = [];
        $arrays['view'] = ['admin'];
        $arrays['viewAny'] = ['admin'];
        $arrays['update'] = ['admin'];
        $arrays['create'] = ['admin'];
        $arrays['delete'] = ['admin'];
        $arrays['restore'] = ['admin'];

        return $arrays;
    }

    public function getPartArrays(): array
    {
        $arrays = [];
        $arrays['view'] = [];
        $arrays['viewAny'] = [];
        $arrays['update'] = [];
        $arrays['create'] = [];
        $arrays['delete'] = [];
        $arrays['restore'] = [];
        $arrays['field'] = [];

        return $arrays;
    }
}
