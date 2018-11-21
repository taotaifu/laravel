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
}
