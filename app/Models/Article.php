<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Laravel\Scout\Searchable;


class Article extends Model
{
	use LogsActivity,Searchable;
	protected $fillable = ['title','content','id'];
	//如果需要记录所有$fillable设置的填充属性，可以使用
	protected static $logFillable = true;
	protected static $recordEvents = ['created','updated'];
	//自定义日志名称
	protected static $logName = 'article';
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

	public function getLink($param){

		return route ('home.article.show',$this) . $param;
	}
}
