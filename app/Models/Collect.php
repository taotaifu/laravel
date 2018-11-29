<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model

{

	//把user_id 写入collect数据表
	protected $fillable = ['user_id'];


	public function user(){

		return  $this->belongsTo (User::class);

	}

	//获取多态关联模型

	public function  belongsModel(){

		return $this->morphTo('collect');

	}
}
