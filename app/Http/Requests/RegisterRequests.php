<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class RegisterRequests extends FormRequest
{

	public function authorize()
	{
		return true;
	}

	public function rules(){

       return [
				'name'=>'required',
			    'eamil'=>'eamil|unique:users',
			    'password'=>'required|min:3|confirmed',
			    'code'=>[
				'required',
				 function($attribute,$value,$fail){

				   if ($value!=session('code')){

					   $fail('验证码不正确');
				   }


			 },


		   ],


	   ];

	}

//错误消息内容
	public function  messages ()
	{
		return [
			'name.required'     =>'请输入昵称' ,
			'email.email'       =>'请输入正确邮箱' ,
			'email.unique'      =>'该邮箱已注册' ,
			'password.required' =>'请输入密码' ,
			'password.min'      =>'密码不得少于3位' ,
			'password.confirmed'=>'两次输入密码不一致' ,
			'code.required'     =>'请输入验证码'
		];
	}

}
