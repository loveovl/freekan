<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginPost extends FormRequest
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
            'user_name'=>'required|max:20|alpha_dash',
            'user_pass'=>'required|max:16|alpha_dash',
        ];
    }
    #自定义错误返回信息
    public function messages(){
        return [
            'user_name.required' => '用户名不能为空',
            'user_name.max'=>'用户名不能超过20位',
            'user_name.alpha_dash'=>'用户名只可以包含字母和数字，以及破折号和下划线。',
            'user_pass.required'  => '密码不能为空',
            'user_pass.max'=>'密码不能超过16位',
            'user_pass.alpha_dash'=>'密码只可以包含字母和数字，以及破折号和下划线。',
        ];
    }
}
