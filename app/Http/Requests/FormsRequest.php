<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormsRequest extends FormRequest
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
            'username' => 'required|unique:user|regex:/^.{2,10}$/',
            'password' => 'required|regex:/^\w{6,12}$/',
            'repassword' => 'same:password',
            'email' => 'email',
            'phone' => 'regex:/\1[3456789]\d{9}/'
        ];
    }

    /**
     * 获取已定义验证规则的错误信息
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => '用户名不能为空',
            'username.regex' => '用户名格式不正确',
            'username.unique' => '该用户名已存在',
            'password.required' => '密码不能为空',
            'password.regex' => '密码格式不正确',
            'repassword.same' => '两次密码不一致',
            'email.email' => '邮箱格式不正确',
            'phone.regex' => '手机号码格式不正确'
        ];
    }
}
