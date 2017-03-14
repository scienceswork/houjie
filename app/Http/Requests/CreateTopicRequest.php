<?php

namespace App\Http\Requests;

use App\Models\Topic;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CreateTopicRequest extends FormRequest
{
    protected $allow_fields = [
        'name', 'content'
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

    public function rules()
    {
        return [
            'name' => 'required',
            'content' => 'required'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '标题不能为空',
            'content.required' => '内容不能为空'
        ];
    }

    public function createTopic($id)
    {
        // 获取所需的字段
        $data = array_filter($this->only($this->allow_fields));
        // 发帖id
        $data['user_id'] = Auth::id();
        // 教师在线id
        $data['teacher_id'] = $id;
        // 创建数据
        $topic = Topic::create($data);
        // 返回数据
        return $topic;
    }
}
