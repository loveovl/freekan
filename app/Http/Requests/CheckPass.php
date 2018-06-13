<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckPass extends FormRequest
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
            'olduser_pass'=>'required|max:16|alpha_dash',
            'newuser_pass'=>'required|max:16|alpha_dash',
        ];
    }
    #自定义错误返回信息
    public function messages(){
        return [
            'olduser_pass.required'  => '密码不能为空',
            'olduser_pass.max'=>'密码不能超过16位',
            'olduser_pass.alpha_dash'=>'密码只可以包含字母和数字，以及破折号和下划线。',
            'newuser_pass.required'  => '密码不能为空',
            'newuser_pass.max'=>'密码不能超过16位',
            'newuser_pass.alpha_dash'=>'密码只可以包含字母和数字，以及破折号和下划线。',
        ];
    }
}
