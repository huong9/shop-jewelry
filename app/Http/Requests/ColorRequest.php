<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
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
            'name' => 'required|unique:color,name',
            'hex_color' => 'required|unique:color,hex_color',
        ];
    }
    public function messages()
    {
        return [
            'name.unique' => 'Tên màu đã tồn tại',
            'hex_color.unique' => 'Màu đã tồn tại',
        ];
    }
}
