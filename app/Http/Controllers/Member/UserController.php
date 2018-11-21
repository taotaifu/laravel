<?php

namespace App\Http\Controllers\Member;

use App\Models\Article;
use App\Models\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
         $articles=Article::latest()->where('user_id',$user->id)->paginate(5);
        return view ('member.user.show',compact ('user','articles'));
    }


    public function edit(User $user,Request $request)
    {     //调用策略
    	$this->authorize ('isMine',$user);

    	$type=$request->query('type');
        return view ('member.user.edit_'.$type,compact ('user'));
    }


    public function update(Request $request, User $user)
    {
        $data=$request->all ();
        //调用策略
        $this->authorize ('isMine',$user);
        $this->validate ($request,[
        	'password'=>'sometimes|required|min:3|confirmed',
			'name'=>'sometimes|required'
		],[
			'password.required'=>'请输入密码',
			'password.min'=>'密码不得少于三位',
			'password.confirmed'=>'输入两次密码不一致',
			'name.required'=>'请输入昵称'
		]);

        //密码加密
        if ($request->password){

        	$data['password']=bcrypt ($data['password']);
		}

		//更新
		$user->update ($data);
        //提示
		return back ()->with ('success','操作成功');
    }


    public function destroy(Controllers $controllers)
    {
        //
    }
}
