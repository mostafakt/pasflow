<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'size' => 'required|max:500000|numeric',
            'name' => 'required|string',
            'hash' => 'required|string',
            'type' => 'required|string',
            'extension' => 'required|string',
            'path' => 'required|string',
        ];
    }
}
