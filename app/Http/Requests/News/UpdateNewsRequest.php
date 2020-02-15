<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
{
    public function rules()
    {
        $id = $this->route('id');
        return [
            'name' => 'required|unique:news,name,'.$id,
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
