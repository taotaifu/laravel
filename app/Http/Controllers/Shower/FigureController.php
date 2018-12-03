<?php

namespace App\Http\Controllers\Shower;

use App\Http\Requests\FigureRequest;
use App\Models\Figure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FigureController extends Controller
{
	public function __construct(){
	$this->middleware('auth',[
		'only'=>['create','store','edit','update','destroy'],
	]);
}

	public function index(Request $request)

	{
		$figures=$request->query('figure');

		$figures = Figure::latest()->paginate(5);

		//dd ($figures);
		return view('shower.figure.index',compact('figures','figures'));
	}


	public function create()
	{
		$figures = Figure::all();
		return view('shower.figure.create',compact ('figures'));
	}


	public function store(FigureRequest $request,Figure $figure )
	{


		$figure->name = $request->name;
		$figure->icon =$request->icon;
		//dd($figure->toArray());
		$figure->save();
		return redirect()->route('shower.figure.index')->with('success','菜单添加成功');
	}


	public function edit(Figure $figure)
	{
		$figures = Figure::all();
		//dd ($figures);
		return view('shower.figure.edit',compact('figures','figure'));
	}

	public function show(Figure $figure)
	{
		$figure = Figure::find(1);
		return view('shower.figure.create',compact('figure'));
	}

	public function update(Request $request, Figure $figure)
	{

		$figure->name = $request->name;
		$figure->icon =$request->icon;
		//dd($article);
		$figure->save();
		return redirect()->route('shower.figure.index')->with('success','菜单编辑成功');
	}


	public function destroy(Figure $figure)
	{
		$figure->delete();
		return redirect()->route('shower.figure.index')->with('success','菜单删除成功');
	}


}
