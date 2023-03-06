<?php

namespace App\Policies;

use App\Models\Question;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

abstract class ApiPolicy
{
    protected $fullView = [];
    protected $fullViewAny = [];
    protected $fullUpdate = [];
    protected $fullCreate = [];
    protected $fullDelete = [];
    protected $fullRestore = [];

    protected $partView = [];
    protected $partViewAny = [];
    protected $partUpdate = [];
    protected $partCreate = [];
    protected $partDelete = [];
    protected $partRestore = [];
    protected $partField = [];

    public function __construct()
    {
        $arrays = $this->getFullArrays();

        $this->fullView = $arrays['view'];
        $this->fullViewAny = $arrays['viewAny'];
        $this->fullUpdate = $arrays['update'];
        $this->fullCreate = $arrays['create'];
        $this->fullDelete = $arrays['delete'];
        $this->fullRestore = $arrays['restore'];


        $lowArrays = $this->getPartArrays();
        $this->partView = $lowArrays['view'];
        $this->partViewAny = $lowArrays['viewAny'];
        $this->partUpdate = $lowArrays['update'];
        $this->partCreate = $lowArrays['create'];
        $this->partDelete = $lowArrays['delete'];
        $this->partRestore = $lowArrays['restore'];
        $this->partField = $lowArrays['field'];

    }

    public function viewAny($user)
    {
        return $this->cleeshedPolicyCode($user[0], $user[1], 'ViewAny');
    }


    public function view($user)
    {
        return $this->cleeshedPolicyCode($user[0], $user[1], 'View');
    }

    public function create(User $user, $object)
    {dd($object);
        return $this->cleeshedPolicyCode($user[0], $user[1], 'Create');
    }

    public function update($user)
    {
        return $this->cleeshedPolicyCode($user[0], $user[1], 'Update');
    }

    public function delete($user)
    {
        return $this->cleeshedPolicyCode($user[0], $user[1], 'Delete');
    }

    public abstract function getFullArrays();

    public abstract function getPartArrays();

    protected function cleeshedPolicyCode($user, $object, $function)
    {
        $partFunction = 'part' . $function;
        $fullFunction = 'full' . $function;

        if (in_array($user->rule->name, $this->$fullFunction))
            return true;
        if (in_array($user->rule->name, $this->$partFunction))
            return $object->isBelong($this->partField, $user->id);
        return false;
    }
}
