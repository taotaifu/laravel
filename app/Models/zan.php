<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class zan extends Model
{
	//把user_id 写入zans数据表
    protected $fillable = ['user_id'];


    //跟User表关联

    public function user(){

    	return  $this->belongsTo (User::class);

	}

}
