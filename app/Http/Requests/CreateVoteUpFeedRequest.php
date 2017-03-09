<?php

namespace App\Http\Requests;

use App\Models\Feed;
use App\Models\VoteUpFeed;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CreateVoteUpFeedRequest extends FormRequest
{
    protected $allow_fields = [
        'feed_id'
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

    public function createVoteUpFeed()
    {
        $data = array_filter($this->only($this->allow_fields));
        $data['user_id'] = Auth::id();
        // 创建点赞
        $voteUpFeed = VoteUpFeed::create($data);
        // 说说点赞数+1
        $feed = Feed::find($data['feed_id']);
        // 自增+1
        $feed->increment('vote_up_count');
        // 返回数据
        return $feed;
    }
}
