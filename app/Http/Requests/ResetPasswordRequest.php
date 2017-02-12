<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
     * 修改密码Request字段规则检验
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|between:6,20',
            'new_password' => 'required|between:6,20|confirmed',
            'new_password_confirmation' => 'required|between:6, 20'
        ];
    }
}
