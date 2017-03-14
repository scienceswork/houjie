<?php

namespace App\Http\Requests;

use App\Models\Article;
use App\Models\ReplyArticle;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CreateReplyArticleRequest extends FormRequest
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
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'content.required' => '评论内容不能为空'
        ];
    }

    public function createReplyArticle($id)
    {
        // 获取数据
        $data = array_filter($this->only($this->allow_fields));
        // 获取用户id
        $data['user_id'] = Auth::id();
        // 获取文章id
        $data['article_id'] = $id;
        // 创建评论
        $reply = ReplyArticle::create($data);
        // 文章评论数自增+1
        $article = Article::find($id);
        // 自增
        $article->increment('rep_count');
        // 返回数据
        return $reply;
    }
}
