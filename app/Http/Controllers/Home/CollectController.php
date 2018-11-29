<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectController extends Controller
{
	public function __construct () {

		$this->middleware('auth',['only'=>['make']]);

	}


	//收藏和取消收藏
	public function make(Request $request){

		//收藏类型
		$type=$request->query('type');
		//收藏的文章id/或者评论的id
		$id=$request->query('id');
		//dd ($request->all ());
		$class='App\Models\\'.ucfirst ($type);
		//dd ($class);
		$models=$class::find($id);
		//dd ($models);
		//$models 通过id找到当前文章或者评论的类型
		//dd ($zan=$models->zan->where('user_id',auth ()->id ())->first());
		if ($collect=$models->collect->where('user_id',auth ()->id ())->first()){
			//收藏 执行删除
			$collect->delete();

		}else{
			//收藏 执行添加
			$models->collect()->create(['user_id'=>auth()->id()]);
		}


		return back ();


	}





}
