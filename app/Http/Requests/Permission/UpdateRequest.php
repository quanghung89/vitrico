<?php

namespace App\Http\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|unique:permissions,title,' . $id
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
