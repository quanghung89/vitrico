<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('id');
        return [
            'name' => 'required|max:30|unique:categories,name,'.$id,
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
