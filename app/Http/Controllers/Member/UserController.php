<?php

namespace App\Http\Controllers\Member;

use App\Models\Article;
use App\Models\Collect;
use App\Models\Zan;
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

    public function __construct () {

    	$this->middleware('auth',[
    		'only'=>'edit','update','attention']);
	}

    //展示用户详情
	public function show(User $user)
    {
         $articles=Article::latest()->where('user_id',$user->id)->paginate(5);
        return view ('member.user.show',compact ('user','articles'));
    }

    //编辑用户资料
    public function edit(User $user,Request $request)
    {     //调用策略
    	$this->authorize ('isMine',$user);

    	$type=$request->query('type');
        return view ('member.user.edit_'.$type,compact ('user'));
    }

     //更新用户资料 头像 密码 名字
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


	//关注 取消关注
	//这里user 被关注者
	public function attention(User $user){
		//dd($user);
		//auth()->user()->following()->toggle($user);
		//自己不能关注自己
		$this->authorize('isNotMine',$user);
		$user->fans()->toggle(auth()->user());
		return back();
	}
     //我的粉丝
	public  function myFans(User $user){

    	$fans=$user->fans()->paginate(9);
    	//dd ($fans);

    	return view ('member.user.edit_fans',compact ('user','fans'));
	}
     //我的关注
	public function myFollowing(User $user){
		//获取
		$followings = $user->following()->paginate(9);

		return view('member.user.edit_following',compact('user','followings'));

	}

	//我的收藏
	public function myCollect(User $user,Request $request,Collect $collect){

    	$type=$request->query('type');
		//获取

		$collectsData = $user->collect()->where ('collect_type','App\Models\\'.ucfirst ($type))->paginate(4);

		return view('member.user.edit_collect',compact('user','collects','collectsData'));

	}

	//我的点赞
	public function myZan(User $user,Request $request,Zan $zan){

    	$type=$request->query('type');
		//获取

		$zansData = $user->zan()->where ('zan_type','App\Models\\'.ucfirst ($type))->paginate(3);

        //dd ($zansData);
		return view('member.user.edit_zan_' . $type ,compact('user','zans','zansData'));

	}

	  public function myNotify(){

    	return view ('member.notify.index');

	  }

}
