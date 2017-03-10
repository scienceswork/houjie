<?php

namespace App\Http\Requests;

use App\Models\News;
use App\Models\ReplyNews;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CreateReplyNewsRequest extends FormRequest
{
    protected $allow_fields = [
        'content'
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

    public function createReplyNews($id)
    {
        // 获取所需的数据
        $data = array_filter($this->only($this->allow_fields));
        // 评论用户id
        $data['user_id'] = Auth::id();
        // 文章id
        $data['news_id'] = $id;
        // 创建评论
        $reply = ReplyNews::create($data);
        // 新闻评论数自增1
        $news = News::find($id);
        // 自增
        $news->increment('reply_count');
        // 返回数据
        return $reply;
    }
}
