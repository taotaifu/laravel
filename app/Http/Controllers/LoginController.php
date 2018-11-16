<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
	public function authenticate(Request $request)
	{    //用户手机认证
		$credentials = $request->only('email', 'password');
         //登录成功的时
		if (\Auth::attempt($credentials)) {

			return redirect()->route('home')->with ('success','登录成功');
		}
		//登录失败时
		return redirect ()->back ()->with ('danger','用户名或者密码不正确，请重新输入');
	}
}
