<?php

namespace App\Http\Requests;

use App\Models\QuizPaper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TakeQuizRequest extends FormRequest
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
            'answers' => ['required', 'array'],
            'answers.*.question_id' => [
                'required',
                'integer',
                'distinct',
                Rule::exists('quiz_questions', 'question_id')->where(function ($query) {
                    return $query->where('quiz_id', $this->quiz_id);
                })
            ],
            'quiz_id' => 'required|integer|exists:quizzes,id',
        ];
    }

}
