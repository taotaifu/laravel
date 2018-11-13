<?php

namespace App\Http\Controllers\Edu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
      public function index(){

      	return view ('edu.article.index');

	  }
         //添加加载页面
	  public function create(){

        return view ('edu.article.create');
	  }
          //数据保存
	  public function store(Request $request){

      	//打印请求的数据  dd
      	dd ($request->all());

	  }
}
