<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'image' => 'file|mimes:jpeg,jpg,gif,png',
        ];
    }
    public function messages()
    {
        return [
            'image.mimes' => 'Bạn cần chọn đúng định dạng ảnh',
            'image.file' => 'Bạn cần chọn file'
        ];
    }
}
