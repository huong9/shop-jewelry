<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'phone' => 'required|unique:users,phone|max:11|min:9',
            'email' => 'required|unique:users,email|max:100|min:2',
            'name' => 'required|min:1',
            'password' => 'required|min:6',
            'confirm_password' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'phone.required' => 'Bạn cần nhập số điện thoại',
            'phone.max' => 'Số điện thoại không hợp lệ',
            'phone.min' => 'Số điện thoại không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
            'email.required' => 'Bạn cần nhập email',
            'email.max' => 'Email không hợp lệ',
            'email.min' => 'Email không hợp lệ',
            'name.required' => 'Bạn cần nhập tên',
            'password.required' => 'Bạn cần nhập mật khẩu',
            'confirm_password.required' => 'Bạn cần nhập lại mật khẩu',
        ];
    }
}
