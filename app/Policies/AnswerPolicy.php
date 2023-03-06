<?php

namespace App\Policies;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy extends ApiPolicy
{
    use HandlesAuthorization;

    public function getFullArrays(): array
    {
        $arrays = [];
        $arrays['view'] = ['admin', 'user'];
        $arrays['viewAny'] = ['admin', 'user'];
        $arrays['update'] = ['admin'];
        $arrays['create'] = ['admin', 'teacher', 'user'];
        $arrays['delete'] = ['admin'];
        $arrays['restore'] = ['admin'];

        return $arrays;
    }

    public function getPartArrays(): array
    {
        $arrays = [];
        $arrays['view'] = ['teacher'];
        $arrays['viewAny'] = ['teacher'];
        $arrays['update'] = ['teacher', 'user'];
        $arrays['create'] = [];
        $arrays['delete'] = ['user', 'teacher'];
        $arrays['restore'] = ['admin'];
        $arrays['field'] = ['user_id'];

        return $arrays;
    }
}
