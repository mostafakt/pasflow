<?php

namespace App\Policies;

use App\Models\Question;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuizPolicy extends ApiPolicy
{
    use HandlesAuthorization;

    public function getFullArrays(): array
    {
        $arrays = [];
        $arrays['view'] = ['admin', 'user', 'teacher'];
        $arrays['viewAny'] = ['admin', 'user', 'teacher'];
        $arrays['update'] = ['admin'];
        $arrays['create'] = ['admin', 'teacher'];
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
        $arrays['delete'] = ['teacher'];
        $arrays['restore'] = [];
        $arrays['field'] = ['creator_id'];

        return $arrays;
    }

}
