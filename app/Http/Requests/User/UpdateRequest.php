<?php

namespace App\Http\Requests\User;

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

        $rule = [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'password' => '',
            'roles' => 'required',
        ];

        if ($this->request->get('password') != null)
        {
            $rule['password'] = 'min:6';
        }

        return $rule;
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên',
            'email.required' => 'Bạn chưa nhập Email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự',
            'roles.required' => 'Bạn chưa chọn role',
        ];
    }
}
