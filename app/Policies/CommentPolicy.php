<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy extends ApiPolicy
{
    public function getFullArrays(): array
    {
        $arrays = [];
        $arrays['view'] = ['admin', 'user', 'teacher'];
        $arrays['viewAny'] = ['admin', 'user', 'teacher'];
        $arrays['update'] = ['admin'];
        $arrays['create'] = ['admin', 'teacher', 'user'];
        $arrays['delete'] = ['admin'];
        $arrays['restore'] = ['admin'];

        return $arrays;
    }

    public function getPartArrays(): array
    {
        $arrays = [];
        $arrays['view'] = [];
        $arrays['viewAny'] = [];
        $arrays['update'] = ['user', 'teacher'];
        $arrays['create'] = [];
        $arrays['delete'] = ['user', 'teacher'];
        $arrays['restore'] = [];
        $arrays['field'] = ['user_id'];

        return $arrays;
    }
}
