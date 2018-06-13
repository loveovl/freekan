<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginPost extends FormRequest
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
            'username'=>'required|max:20|alpha_dash',
            'passwd'=>'required|max:255|alpha_dash',
        ];
    }
    #自定义错误返回信息
    public function messages(){
        return [
            'username.required' => '用户名不能为空',
            'username.max'=>'用户名不能超过20位',
            'username.alpha_dash'=>'用户名只可以包含字母和数字，以及破折号和下划线。',
            'passwd.required'  => '密码不能为空',
            'passwd.max'=>'密码不能超过255位',
            'passwd.alpha_dash'=>'密码只可以包含字母和数字，以及破折号和下划线。',
        ];
    }
}
