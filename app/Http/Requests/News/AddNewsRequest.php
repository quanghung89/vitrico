<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class AddNewsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:news,name',
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên',
            'name.unique' => 'Tên đã tồn tại',
            'title.required' => 'Bạn chưa nhập tiêu đề',
            'content.required' => 'Bạn chưa nhập nội dung',
            'category.required' => 'Bạn chưa chọn loại tin',
        ];
    }
}
