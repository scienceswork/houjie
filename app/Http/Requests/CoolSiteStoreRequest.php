<?php

namespace App\Http\Requests;

use App\Models\CoolSite;
use Illuminate\Foundation\Http\FormRequest;

class CoolSiteStoreRequest extends FormRequest
{
    protected $allow_fields = [
        'name', 'url', 'description'
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
     * 定义酷站表单验证
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|between:1,100',
                    'url' => 'required|url',
                    'description' => 'required|min:5',
                    'img_url' => 'mimes:jpg,jpeg,png|max:5120'
                ];
            default:
                break;
        }
    }


    public function messages()
    {
        return [
            'name.required' => '酷站名称不能为空',
            'name.between:1,100' => '酷站名称长度在1-100之间',
            'url.required' => '酷站网址不能为空',
            'url.url' => '请填写正确的酷站网址',
            'description.required' => '酷站描述不能为空',
            'description.min:5' => '酷站描述最少需要5个字符',
            'img_url.mimes' => '请上传支持的图片类型:jpg, jpeg, png',
            'img_url.max' => '请上传不超过5M的图片',
        ];
    }

    /**
     * 创建酷站申请
     * @return static
     */
    public function createCoolSite()
    {
        $img_url = $this->file('img_url')->store('cool');
        $data = array_filter($this->only($this->allow_fields));
        $data['img_url'] = $img_url;
        $data['user_id'] = \Auth::id();
        $cool = CoolSite::create($data);
        return $cool;
    }
}
