<?php

namespace App\Policies;

use App\Models\File;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilePolicy extends ApiPolicy
{
    use HandlesAuthorization;

    public function getFullArrays(): array
    {
        $arrays = [];
        $arrays['view'] = ['admin'];
        $arrays['viewAny'] = ['admin'];
        $arrays['update'] = ['admin'];
        $arrays['create'] = ['admin', 'teacher', 'user'];
        $arrays['delete'] = ['admin', 'teacher'];
        $arrays['restore'] = ['admin'];
        $arrays['model'] = [];

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
