<?php

namespace App\Http\Requests;

use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CreateTeacherRequest extends FormRequest
{
    // 设置允许创建的字段
    protected $allow_fields = [
        'name', 'phone', 'email', 'description', 'reason',
        'avatar', 'prove'
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
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'avatar' => 'required|mimes:jpg,jpeg,png|max:5120',
            'prove' => 'required|mimes:jpg,jpeg,png|max:5120',
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
            'phone.required' => '手机号码是必填项',
            'email.required' => '电子邮件是必填项',
            'avatar.required' => '请上传教师在线封面图',
            'avatar.mimes' => '请上传支持的图片类型:jpg, jpeg, png',
            'avatar.max' => '请上传不超过5M的图片',
            'prove.required' => '请上传资质证明',
            'prove.mimes' => '请上传支持的图片类型:jpg, jpeg, png',
            'prove.max' => '请上传不超过5M的图片',
            'description.required' => '教师在线描述是必填项',
            'reason.required' => '申请理由是必填项',
        ];
    }

    public function createTeacher()
    {
        $avatar_url = $this
            ->file('avatar')
            ->storeAs('teacher', md5(uniqid(microtime(),true)) . '.' . $this->file('avatar')->getClientOriginalExtension());
        $prove_url = $this
            ->file('prove')
            ->storeAs('teacher', md5(uniqid(microtime(),true)) . '.' . $this->file('prove')->getClientOriginalExtension());
        $data = array_filter($this->only($this->allow_fields));
        $data['user_id'] = Auth::id();
        $data['avatar'] = $avatar_url;
        $data['prove'] = $prove_url;
        $teacher = Teacher::create($data);
        return $teacher;
    }
}
