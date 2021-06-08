<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|max:100|min:2',
            'password' => 'required|min:3',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Bạn cần nhập email',
            'email.max' => 'Email không hợp lệ',
            'email.min' => 'Email không hợp lệ',
            'password.required' => 'Bạn cần nhập mật khẩu',
        ];
    }
}
