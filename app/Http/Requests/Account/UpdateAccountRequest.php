<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
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
            'name' => 'required|max:50',
            'username' => 'required|max:30|unique:accounts,username,'.$id,
            'email' => 'required|email|max:30|unique:accounts,email,'.$id,
            'no_cmt' => 'required|max:30',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'=> 'Bạn chưa nhập tên Họ Tên',
            'name.max'=> 'Họ tên dài hơn 50 kí tự',
            'username.required'=> 'Bạn chưa nhập tên tên đăng nhập',
            'username.unique'=> 'Tên đăng nhập đã tồn tại',
            'username.max'=> 'Tên chỉ được tối đa 30 kí tự',
            'email.required'=> 'Chưa nhập email',
            'email.email'=> ' không đúng email',
            'email.unique'=> ' Email đã tồn tại',
            'email.max'=> ' Tên chỉ được tối đa 30 kí tự',
            'no_cmt.required'=> 'Chưa nhập số chứng minh thư / Hộ chiếu',
            'no_cmt.max'=> ' Chỉ được tối đa 30 kí tự',
        ];
    }
}
