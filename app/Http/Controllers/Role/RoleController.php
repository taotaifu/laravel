<?php

namespace App\Http\Controllers\Role;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index(Request $request)
    {

    	$roles=Role::all ();

       return view ('role.role.index',compact ('roles'));
    }


    public function create()
    {
    	$roles=Role::all ();
        return view ('role.role.create',compact ('roles'));
    }


    public function store(Request $request,Role $role)
    {

		Role::create($request->all ());
		//dd ('1');
        //dd ($role);
		return redirect()->route('role.role.index')->with('success','菜单添加成功');
    }




    public function edit(Role $role)
    {
		$roles = Role::all();
		//dd ($roles);
		return view('role.role.edit',compact('roles','role'));
    }


    public function update(Request $request, Role $role)
    {
		Role::update($request->all ());
		//dd ($role);
		return redirect()->route('role.role.index')->with('success','菜单添加成功');
    }


    public function destroy(Role $role)
    {
		$role->delete();
		return redirect()->route('role.role.index')->with('success','菜单删除成功');

	}
}
