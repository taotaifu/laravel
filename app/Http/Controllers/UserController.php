<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequests;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	//登录
    public function login(){

       return view ('user.login');

	}
      //注册
	public  function  register(){

    	return view ('user.register');
	}

	 //提交数据
    public function store(UserRequests $requests){

              //dd ($requests->all ());
		  //数据存储到数据表
         $data=$requests->all ();
         $data['password']=bcrypt ($data['password']);

         User::create($data);
         //提示跳转
         return redirect ()->route ('login')->with ('succes','注册成功');
	}
}
