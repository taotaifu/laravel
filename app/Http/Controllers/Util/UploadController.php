<?php

namespace App\Http\Controllers\Util;

use App\Exceptions\UploadException;
use App\Models\Attachment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//1.首先能正常上传图片
//2.将上传文件正常写入数据表
//3.文件列表方法filesLists
//4.用异常类处理上传
class UploadController extends Controller
{
	//处理上传
	public function uploader(Request $request){
		//dd(asset(''));
		//dd(storage_path(''));
		//dd(public_path());
		//打印测试，看上传之后代码是否执行到这里
		//dd(1);
		//上传手册参考(文件存储--文件上传)：http://www.houdunren.com/edu/section/107
		//$path = $request->file('avatar')->store('avatars');
		//$path = $request->file('上传表单name名')->store('上传文件存储目录','指定磁盘(对应config/filesystem.php中disk)');
		//dd($_FILES);来查看上传表单的name
		//以下这句话中第一个attachment意思上传文件存储目录
		//第二个attachment对应config/filesystem.php中disk选项中attachment
		$file = $request->file('file');
		//对上传文件的大小以及类型拦截
		$this->checkSize($file);
		$this->checkType($file);

		if($file){
			$path = $file->store('attachment','attachment');
			//将上传数据存储到数据表
			//我们创建附件的模型与迁移文件
			//关联添加
			auth()->user()->attachment()->create([
				//$file->getClientOriginalName()获取客户端原始文件名
				'name'=>$file->getClientOriginalName(),
				'path'=>url($path)
			]);
		}
		//dd($path);
		//dd(url($path));
		return ['file' =>url($path), 'code' => 0];
	}

	//验证上传大小
	private function checkSize($file){
		//$file->getSize()获取上传文件大小
		if($file->getSize() > 2000000){
			//return  ['message' =>'上传文件过大', 'code' => 403];
			//使用异常类处理上传异常
			//创建异常类:exception
			throw new UploadException('上传文件过大');
		}
	}

	//验证上传类型
	private function checkType($file){
		if(!in_array(strtolower($file->getClientOriginalExtension()),['jpg','gif','png'])){
			//return  ['message' =>'类型不允许', 'code' => 403];
			throw new UploadException('类型不允许');
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
