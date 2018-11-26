<?php

namespace App\Http\Controllers\Util;

use App\Exceptions\UploadException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{

	//上传图片
    public function uploader(Request $request){
          //dd (1);
		//dd (asset (''));//"http://laravel.edu/"
		//dd(storage_path(''));//"E:\software\www\c98\laravel\storage"
		//dd(public_path());//"E:\software\www\c98\laravel\public"

		$file = $request->file('file');

		//对上传文件的大小类型进行拦截

		$this->checkSize ($file);
		$this->chechType ($file);


		if($file){

			$path = $file->store('attachment','attachment');

			auth()->user()->attachment()->create([

				'name'=>$file->getClientOriginalName(),
				'path'=>url($path)
			]);
		}
		//dd($path);
		//dd(url($path));
		return ['file' =>url($path), 'code' => 0];

		//$path = $request->file('avatar')->store('avatars');

		//return ['file'=>url($path),'code'=>0];


	}
	//上传图片的大小类型判断

	  //大小判断
	private function checkSize($file){

    	 //dd ($file->getSize());

		if ($file->getSize()>20000000){

           //return ['message'=>'上传文件过大','code'=>403];

			throw new UploadException('上传文件过大');
		}

	}

	private function chechType($file){
		 //getClientOriginalExtension() 获取图片类型
        // dd ($file->getClientOriginalExtension());

		if(!in_array(strtolower($file->getClientOriginalExtension()),['jpg','png'])){

		   throw  new  UploadException('图片类型不容许');

		}
	}



	//获取图片列表
	public function filesLists(){
		$files = auth()->user()->attachment()->paginate(20);
		$data = [];
		foreach($files as $file){
			$data[] = [
				'url'=>$file['path'],
				'path'=>$file['path']
			];
		}
		//1dd($data);

		return [
			'data'=>$data,
			'page'=>$files->links() . '',//这里一定要注意分页后面拼接一个空字符串
			'code'=> 0
		];
	}
}
