<?php

namespace App\Http\Requests\Slide;

use Illuminate\Foundation\Http\FormRequest;

class CreateSlideRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'image.required'=> 'Bạn chưa chọn ảnh',
        ];
    }
}
