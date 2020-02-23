<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:roles,title'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Bạn chưa nhập tên',
            'title.unique' => 'Tên đã tồn tại',
        ];
    }
}
