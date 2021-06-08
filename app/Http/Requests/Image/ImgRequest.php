<?php

namespace App\Http\Requests\Image;

use Illuminate\Foundation\Http\FormRequest;

class ImgRequest extends FormRequest
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
            'product_id' => 'required',
            'image' => 'required|file|mimes:jpeg,jpg,gif,png',
        ];
    }
    public function messages()
    {
        return [
            'image.required' => 'Bạn cần chọn ảnh'
        ];
    }
}
