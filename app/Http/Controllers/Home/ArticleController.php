<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
	public function __construct(){
		$this->middleware('auth',[
			'only'=>['create','store','edit','update','destroy'],
		]);
	}

	public function index(Request $request)
	{
		$category=$request->query('category');
        $articles=Article::latest();
        //判断
		if($category){
			$articles=$articles->where('category_id',$category);
		}
		//分页
		$articles=$articles->paginate(10);
        $categories=Category::all ();
        //dd ($categories);
		return view('home.article.index',compact('articles','categories'));
	}

	public function create()
	{
		$categories = Category::all();
		//dd($categories->toArray());
		return view('home.article.create',compact('categories'));
	}

	public function store(ArticleRequest $request,Article $article)
	{
		//获取当前登录用户id
		//dd(auth()->id());
		//dd($request->all());
		$article->title = $request->title;
		$article->category_id = $request->category_id;
		$article->content = $request['content'];
		$article->user_id = auth()->id();
		//dd($article);
		$article->save();
		return redirect()->route('home.article.index')->with('success','文章发布成功');
	}


	public function show(Article $article)
	{
		return view('home.article.show',compact('article'));
	}


	public function edit(Article $article)
	{
		$this->authorize('update',$article);
		//dump($article->toArray());
		//获取所有栏目数据
		$categories = Category::all();
		//提示
		return view('home.article.edit',compact('categories','article'));
	}


	public function update(ArticleRequest $request, Article $article)
	{
		$this->authorize('update',$article);
		$article->title = $request->title;
		$article->category_id = $request->category_id;
		$article->content = $request['content'];
		//dd($article);
		$article->save();
		//提示
		return redirect()->route('home.article.index')->with('success','文章编辑成功');
	}


	public function destroy(Article $article)
	{
		$this->authorize('delete',$article);
		$article->delete();
		return redirect()->route('home.article.index')->with('success','文章删除成功');
	}
}
