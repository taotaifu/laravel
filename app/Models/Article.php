<?php

namespace App\Models;
use APP\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	 //文章与用户的关联
	public function user(){

		return $this->belongsTo (User::class,'user_id','id');
	}

	//栏目的关联
     public function category(){

		return $this->belongsTo (Category::class);
	 }

	//定义zan 的多态联系

	public function zan(){
		//第一个参数关联模型
		// 第二个参数 类型的前缀 zan_id zan_type
		return $this->morphMany (Zan::class,'zan');
	}

	//collect 的多态联系

	public function collect(){
		//第一个参数关联模型
		// 第二个参数 类型的前缀
		return $this->morphMany (Collect::class,'collect');
	}
}
