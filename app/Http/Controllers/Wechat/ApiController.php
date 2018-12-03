<?php

namespace App\Http\Controllers\Wechat;

use App\Services\WechatService;
use Houdunwang\WeChat\WeChat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 跟微信通信
 * Class ApiController
 *
 * @package App\Http\Controllers\Wechat
 */
class ApiController extends Controller
{
	//微信后台接口配置 url 填写地址指向该方法
	//调用WechatService ,这个类中构造方法进行通信验证
	public function handler(WechatService $wechatService){
		echo 1;
	}
}
