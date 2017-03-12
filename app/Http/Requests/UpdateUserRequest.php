<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public $allow_fields = [
        'name', 'real_name', 'phone', 'school', 'student_id',
        'introduction', 'sex'
    ];

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
        ];
    }

    /**
     * 更新用户数据
     * @param User $user
     * @return User $user
     */
    public function performUpdate(User $user)
    {
        // 仅获取可以修改的字段，防止恶意修改
        $data = array_filter($this->only($this->allow_fields));
        // 更新数据
        $user->update($data);
        // 返回数据
        return $user;
    }
}
