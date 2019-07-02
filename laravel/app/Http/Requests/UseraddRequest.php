<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UseraddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //给校验请求类授权
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //设置规则
    public function rules()
    {
        return [
            //用户名规则 不能为空 多个规则用|隔开   
            //\w{3,8}/ 正则规则
            //unique 唯一规则  users 表名
            'username'=>'required|regex:/\w{3,8}/|unique:user',
            //密码规则
            'password'=>'required|regex:/\w{6,16}/',
        ];
    }

    //自定义错误消息
    public function messages(){
        return [
            //自定义用户名的规则错误消息
            'username.required'=>'用户名不能为空',
            'username.regex'=>'用户名必须是3-8的任意的数字字母',
            'username.unique'=>'用户名被别的小伙伴用了',
            //密码
            'password.required'=>'密码不能为空',
            
            

            ];
    }
}

