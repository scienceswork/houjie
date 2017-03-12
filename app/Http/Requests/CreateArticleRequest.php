<?php

namespace App\Http\Requests;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CreateArticleRequest extends FormRequest
{
    protected $allow_fields = [
        'title', 'content'
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

    public function createArticle()
    {
        // 获取数据
        $data = array_filter($this->only($this->allow_fields));
        // 用户id
        $data['user_id'] = Auth::id();
        // 创建文章
        $article = Article::create($data);
        // 返回数据
        return $article;
    }
}