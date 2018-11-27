<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZanController extends Controller
{

	public function __construct () {

		$this->middleware('auth',['only'=>['make']]);

	}


	//点赞和取消赞
	public function make(Request $request){

		//点赞类型
		$type=$request->query('type');
		//点赞的文章id/或者评论的id
		$id=$request->query('id');
		//dd ($request->all ());
		$class='App\Models\\'.ucfirst ($type);
		//dd ($class);
		$models = $class::find($id);
		//dd ($models);
		//$models 通过id找到当前文章或者评论的类型
          //dd ($zan=$models->zan->where('user_id',auth ()->id ())->first());
		if ($zan=$models->zan->where('user_id',auth ()->id ())->first()){
               //点赞 执行删除
			   $zan->delete();

		}else{
               //点赞 执行添加
			$models->zan()->create(['user_id'=>auth()->id()]);
		}

         //判断是否为异步
		if ($request->ajax ()){

           $models=$class::find($id);

           return ['code'=>1,'message'=>'','zan_num'=>$models->zan->count()];

		}

		return back ();


	}







}
