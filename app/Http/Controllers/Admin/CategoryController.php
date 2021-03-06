<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	//$categories=Category::all ();
          //dd ($categories);
		//分页
		$categories=Category::paginate(2);
        return view ('admin.category.index',compact ('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //
    public function create()
    {
        return view ('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
    	//dd ($request->all ());
        Category::create($request->all ());
        //提示
		return redirect ()->route ('admin.category.index')->with ('success','操作成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    //public function show(Category $category)
    //{
    //
    //}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    //编辑
    public function edit(Category $category)
    {
		return view ('admin.category.edit',compact ('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    //更新
    public function update(Request $request, Category $category)
    {
        $category->update($request->all ());

        return redirect ()->route ('admin.category.index')->with ('success','更新成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    //删除
    public function destroy(Category $category)
    {
        $category->delete ();
        return redirect ()->route ('admin.category.index')->with ('success','删除成功');
    }
}
