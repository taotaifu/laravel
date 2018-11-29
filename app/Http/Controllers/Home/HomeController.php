<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller{

	public function index(){
		//获取所有动态
		$actives = Activity::latest()->paginate(5);

		//渲染模板页面
		return view('home.index',compact('actives'));
	}

	public function search(Request $request){
		//接受搜索的关键词
		$wd=$request->query('wd');
		//$wd = $request->query('wd');
		$articles = Article::search($wd)->paginate(10);
		return view('home.search',compact('articles'));
	}
}
