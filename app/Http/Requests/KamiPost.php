<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KamiPost extends FormRequest
{
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
            'key'=>'required|between:60,61|alpha_dash',
        ];
    }

    #自定义错误返回信息
    public function messages(){
        return [
            'key.required' => '卡密不能为空',
            'key.between'=>'卡密长度不正确',
            'key.alpha_dash'=>'卡密包含非法字符',
        ];
    }
}
