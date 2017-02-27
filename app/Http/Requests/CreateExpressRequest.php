<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateExpressRequest extends FormRequest
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
            'receiver' => 'required',
            'sender' => 'required',
            'content' => 'required|min:3',
            'password' => 'required|unique:expressions,password',
            'is_show' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'receiver.required' => '小伙伴，留下表白的对象吧，表白对象不能为空',
            'sender.required' => '小伙伴，留下足迹吧，万一Ta也喜欢你呢',
            'content.min' => '小伙伴，情书最少要三个字呐',
            'password.required' => '定义一个专属于你和TA的专属密码吧',
            'password.unique' => '晚来一步，该专属密码已经被人使用啦',
            'is_show.required' => '请选择是否展示到表白墙',
            'is_show.boolean' => '请正确选择是否展示到表白墙',
        ];
    }
}
