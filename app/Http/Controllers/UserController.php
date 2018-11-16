<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\UserRequests;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	  public function __construct () {

        $this->middleware('guest',[

			'only'=>['login','loginForm','register','store','passwordReset','passwordResetForm'],

		]);

	  }


	//登录
    public function login(){

       return view ('user.login');

	}
      //注册
	public  function  register(){

    	return view ('user.register');
	}

	//已有账号 去登录

	public function loginFrom(Request $request){

             $this->validate ($request,[

             	 'email'=>'email',
				 'password'=>'required|min:3'
			 ],[
			 	 'email.email'=>'请输入邮箱',
				 'password.required'=>'请输入密码',
				 'password.min'=>'密码不能少于3位'
			 ]);
             //判断提交登录的时候 提交的密码正不正确  正确的话给通过
		    return (new LoginController())->authenticate($request);
	}

	 //提交数据
    public function store(UserRequests $requests){

    	  //dd ($requests->all ());
		  //数据存储到数据表
         $data=$requests->all ();
         $data['password']=bcrypt ($data['password']);
         $data['email_verified_at']=now ();
         User::create($data);
         //提示跳转
         return redirect ()->route('login')->with ('succes','注册成功');
	}

	//注销登录是 返回首页
	public function logout(){

           \Auth::logout ();
           return redirect ()->route ('home');

	}

	//找回密码
	public  function passwordReset(){

         return view ('user.password_reset');

	}
    //找回密码提交
   public function passwordResetForm(PasswordResetRequest $request){

         $user=User::where('eamil',$request->eamil)->first();
         //判断
         if ($user){
              $user->password=bcrypt ($request->password);
              //保存
              $user->save();
              //提示
              return redirect ()->route ('login')->with ('succes','密码重置成功');
		 }

		 return redirect ()->back ()->with ('danger','邮箱未注册');
   }
}
