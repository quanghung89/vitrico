<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:categories,name|max:30',
            'title' => 'required|max:30',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'=> 'Bạn chưa nhập tên category',
            'name.unique'=> 'Tên đã tồn tại',
            'name.max'=> ' Tên chỉ được tối đa 30 kí tự',
            'title.required'=> 'Chưa nhập Title',
            'title.max'=> ' Tên chỉ được tối đa 30 kí tự',
        ];
    }
}
