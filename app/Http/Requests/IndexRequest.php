<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //   'orderby'=>'required|string|exists:questions'
            'value' => ' numeric',
            'skip' => ' numeric',
            'take' => ' numeric',
            'string' => 'string',
            'q' => 'string',
            'filed' => 'string',
            'interest_id' => 'numeric|exists:categories,interest_id',
            'category_id' => 'numeric|exists:questions,category_id',
            '' => '',


        ];
    }
}
