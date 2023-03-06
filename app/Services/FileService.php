<?php

namespace App\Services;


use App\Http\Requests\StoreFileRequest;
use App\Models\File;
use phpDocumentor\Reflection\Element;

class FileService
{
    public function addImage(StoreFileRequest $request, User $user)
    {
$user->
        $element->save();

    }

    public function updateIamge(StoreFileRequest $request, $name)
    {

        $image = File::query()->where('name', $name);
        $image->update($request->all());
        $image->save();

    }
}
