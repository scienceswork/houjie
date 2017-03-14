<?php

namespace App\Http\Requests;

use App\Models\Feed;
use App\Models\ReplyFeed;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CreateReplyFeedRequest extends FormRequest
{
    // 允许的字段
    protected $allow_fields = [
        'feed_id', 'content'
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
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'content.required' => '评论内容不能为空'
        ];
    }

    public function createReplyFeed()
    {
        // 获得数据
        $data = array_filter($this->only($this->allow_fields));
        // 写入用户的user_id
        $data['user_id'] = Auth::id();
        // 创建评论
        $reply = ReplyFeed::create($data);
        // 对应说说的留言数+1
        $feed = Feed::find($data['feed_id']);
        // 自增+1
        $feed->increment('rep_count');
        // 返回数据
        return $reply;
    }
}
