<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTeacherRequest extends FormRequest
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
            'name' => 'required',
            'slug' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'avatar' => 'required',
            'prove' => 'required',
            'description' => 'required',
            'reason' => 'required',
        ];
    }

    /**
     * 验证提示信息
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '教师在线名称是必填项',
            'slug.required' => '缩略名是必填项',
            'phone.required' => '手机号码是必填项',
            'email.required' => '电子邮件是必填项',
            'avatar.required' => '请上传教师在线封面图',
            'prove.required' => '请上传资质证明',
            'description.required' => '教师在线描述是必填项',
            'reason.required' => '申请理由是必填项',
        ];
    }
}
