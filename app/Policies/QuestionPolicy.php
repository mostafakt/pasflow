<?php

namespace App\Policies;

use App\Models\Question;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy extends ApiPolicy
{
    use HandlesAuthorization;


    public function getFullArrays(): array
    {
        $arrays = [];
        $arrays['view'] = ['admin'];
        $arrays['viewAny'] = ['admin'];
        $arrays['update'] = ['admin'];
        $arrays['create'] = ['admin', 'teacher'];
        $arrays['delete'] = ['admin'];
        $arrays['restore'] = ['admin'];
        $arrays['model'] = [];


        return $arrays;

    }

    public function getPartArrays(): array
    {
        $arrays = [];
        $arrays['view'] = ['teacher', 'user'];
        $arrays['viewAny'] = ['teacher', 'user'];
        $arrays['update'] = ['teacher', 'user'];
        $arrays['create'] = [];
        $arrays['delete'] = ['teacher', 'user'];
        $arrays['restore'] = ['teacher', 'user'];
        $arrays['field'] = ['user_id'];

        return $arrays;
    }

}
