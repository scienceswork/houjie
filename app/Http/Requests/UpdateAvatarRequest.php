<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAvatarRequest extends FormRequest
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
            'avatar' => 'required|mimes:jpg,jpeg,png|max:5120'
        ];
    }

    public function messages()
    {
        return [
            'avatar.required' => '请上传头像',
            'avatar.mimes' => '请上传支持的图片类型:jpg, jpeg, png'
        ];
    }
}
