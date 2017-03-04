<?php

namespace App\Http\Requests;

use App\Models\ReplyTopic;
use App\Models\Topic;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CreateReplyTopicRequest extends FormRequest
{
    // 设置允许的字段
    protected $allow_fields = [
        'reply'
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

    public function createReply($id)
    {
        // 获得允许的字段
        $data = array_filter($this->only($this->allow_fields));
        // 填入用户id
        $data['user_id'] = Auth::id();
        // 填入帖子id
        $data['topic_id'] = $id;
        // 创建回复
        $reply = ReplyTopic::create($data);
        // 创建回复成功后，将帖子的回帖数+1
        $topic = Topic::findOrFail($reply->topic_id);
        $topic->increment('rep_count');
        // 并且最后回复内容更新
        $topic->last_rep_content = $reply->reply;
        // 更新最后回复用户
        $topic->last_rep_user = Auth::id();
        // 保存
        $topic->save();
        // 返回
        return $reply;
    }
}
