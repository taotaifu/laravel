<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function __construct(){
		//调用中间件，保护登录注册（已经登录用户不允许再访问登录注册）
		$this->middleware('guest',[
			'only'=>['login','loginForm','register','store','passwordReset','passwordResetForm'],
		]);
	}

	//加载登录页面
	public function login(){

		return view('user.login');
	}

	//登录提交
	public function loginFrom(Request $request){
		//dd($request->remember);
		//验证
		$this->validate($request,[
			'email'=>'email',
			'password'=>'required|min:3'
		],[
			'email.email'=>'请输入邮箱',
			'password.required'=>'请输入登录密码',
			'password.min'=>'密码不得少于3位置'
		]);
		//执行登录
		//手册：用户认证
		$credentials = $request->only('email', 'password');
		if(\Auth::attempt($credentials,$request->remember)){
			//登录成功，跳转到首页
			return redirect()->route('home')->with('success','登录成功');
		}
		return redirect()->back()->with('danger','用户名密码不正确');
	}

	//加载注册页面
	public function register(){
		//渲染注册页面
		return view('user.register');
	}

	//用户提交注册
	public function store(RegisterRequest $request){
		//dd($request->all());
		//将数据存储到数据表
		$data = $request->all();
		$data['password'] = bcrypt($data['password']);
		User::create($data);
		//模型事件，需要再注册之后，把email_verified_at字段事件自动处理
		//提示并且跳转
		return redirect()->route('login')->with('success','注册成功');
	}

	//注销登录
	public function logout(){
		\Auth::logout();
		return redirect()->route('home');
	}

	//重置密码
	public function passwordReset(){
		return view('user.password_reset');
	}
	//重置密码提交
	public function passwordResetForm(PasswordResetRequest $request){
		//根据用户提交来的邮箱去查找数据
		$user = User::where('email',$request->email)->first();
		if($user){
			//更新密码
			$user->password = bcrypt($request->password);
			$user->save();
			return redirect()->route('login')->with('success','密码重置成功');
		}
		return redirect()->back()->with('danger','该邮箱未注册');
	}
}
