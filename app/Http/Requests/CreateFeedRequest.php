<?php

namespace App\Http\Requests;

use App\Models\Feed;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CreateFeedRequest extends FormRequest
{
    // 设置允许的字段
    protected $allow_fields = ['content'];

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

    public function createFeed()
    {
        $data = array_filter($this->only($this->allow_fields));
        // 设置用户id
        $data['user_id'] = Auth::id();
        // 创建说说
        $feed = Feed::create($data);
        // 返回
        return $feed;
    }
}
