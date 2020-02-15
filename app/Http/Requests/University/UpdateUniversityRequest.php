<?php

namespace App\Http\Requests\University;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUniversityRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Bạn chưa nhập tiêu đề',
            'content.required' => 'Bạn chưa nhập nội dung',
        ];
    }
}
