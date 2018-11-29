<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Comment extends Model
{
	use LogsActivity;
	protected $fillable = ['content','article_id'];
	//如果需要记录所有$fillable设置的填充属性，可以使用
	protected static $logFillable = true;
	protected static $recordEvents = ['created','updated'];
	//自定义日志名称
	protected static $logName = 'comment';



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

	//collect 的多态联系

	public function collect(){
		//第一个参数关联模型
		// 第二个参数 类型的前缀
		return $this->morphMany (Collect::class,'collect');
	}

	//栏目的关联
	public function category(){

		return $this->belongsTo (Category::class);
	}

	public function article(){

		return $this->belongsTo (Article::class);
	}

}
