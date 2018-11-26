<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $casts = [
		'created_at' => 'datetime:Y-m-d',
	];

	//关联用户表
   public function user(){

	   return $this->belongsTo(User::class);
   }

	//定义zan 的多态联系

	public function zan(){
		//第一个参数关联模型
		// 第二个参数 类型的前缀 zan_id zan_type
		return $this->morphMany (Zan::class,'zan');
	}
}
