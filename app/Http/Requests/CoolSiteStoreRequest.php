<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoolSiteStoreRequest extends FormRequest
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
     * 定义酷站表单验证
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|between:1,100',
                    'url' => 'required|url',
                    'description' => 'required|min:5'
                ];
            default:
                break;
        }
    }


    public function messages()
    {
        return [
            'name.required' => '酷站名称不能为空',
            'name.between:1,100' => '酷站名称长度在1-100之间',
            'url.required' => '酷站网址不能为空',
            'url.url' => '请填写正确的酷站网址',
            'description.required' => '酷站描述不能为空',
            'description.min:5' => '酷站描述最少需要5个字符'
        ];
    }
}
