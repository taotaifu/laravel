<?php

namespace App\Services;

use Houdunwang\WeChat\WeChat;

class WechatService{

	public function __construct () {

		$config=config("hd_wechat");
		//dd ($config);

		WeChat::config ($config);
		WeChat::valid();



	}


}