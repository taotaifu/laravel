<?php

namespace App\Http\Controllers\Edu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
	public function index ()
	{

		return view ( 'edu.photo.index' );
	}


	public function create ()
	{

		return view ( 'edu.photo.create' );
	}

	public function store ( Request $request )
	{
         dd ($request->all ());


	}
}

