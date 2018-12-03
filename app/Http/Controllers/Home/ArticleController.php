<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
	public function __construct(){
		$this->middleware('auth',[
			//'only'=>['create','store','edit','update','destroy'],
			'except'=>['index','show']
		]);
	}

	public function index(Request $request)
	{
		//测试模型关联
		//$article = Article::find(10);
		//dd($article->toArray());
		//dd($article);
		//dd($article->user);
		//dd($article->user->name);
		//die;
		//找到跟当前文章分类相同所有文章
		//dd($article->category->article->toArray());

		//测试策略
		//$data = Article::find(10);

		//接受category参数
		$category = $request->query('category');
		$articles = Article::latest();

		if($category){

			$articles = $articles->where('category_id',$category);
		}
		$articles = $articles->paginate(10);
		//$articles = Article::latest()->get();
		//dd($articles->toArray());
		//获取所有栏目
		//$categories = Category::limit(3)->get();
		$categories = Category::all();
		//dd($categories);
		return view('home.article.index',compact('articles','categories'));
	}


	public function create()
	{
		//获取所有栏目数据
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
		//读取当前文章所有点赞用户
		//dd($article->zan);
		//foreach($article->zan as $zan){
		//	dump($zan->user->icon);
		//}

		//dd($article->with('user')->where('id',$article->id)->first()->toArray());
		//协助测试获取粉丝/关注的人
		//$user = User::find(22);
		//dd($user->fans);
		$user = User::find(1);
		//dd($user->following->toArray());
		return view('home.article.show',compact('article'));
	}


	public function edit(Article $article)
	{
		//('策略方法'，对应的模型)
		$this->authorize('update',$article);
		//dump($article->toArray());
		//获取所有栏目数据
		$categories = Category::all();
		//dd($categories->toArray());
		return view('home.article.edit',compact('categories','article'));
	}


	public function update(ArticleRequest $request, Article $article)
	{
		$this->authorize('update',$article);
		$article->title = $request->title;
		$article->category_id = $request->category_id;
		$article->content = $request['content'];
		//$article->user_id = auth()->id();
		//dd($article);
		$article->save();
		return redirect()->route('home.article.index')->with('success','文章编辑成功');
	}


	public function destroy(Article $article)
	{
		$this->authorize('delete',$article);
		$article->delete();
		return redirect()->route('home.article.index')->with('success','文章删除成功');
	}
}
