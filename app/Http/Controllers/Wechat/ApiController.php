<?php

namespace App\Http\Controllers\Wechat;

use App\Models\Keyword;
use App\Models\ResponseBase;
use App\Models\ResponseText;
use App\Models\Rule;
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

		//$arr = 1;
		//$keyword = Keyword::where('key',$arr)->first();
		//$rule = $keyword->rule;
		//$news = json_decode($rule->responseNews->toArray()[0]['data'],true);
		//dd ($news);
		//die;

		//消息管理模块
		$instance =WeChat::instance('message');


		//判断是否是关注事件
		if ($instance->isSubscribeEvent())
		{
			$content = ResponseBase::find(1);
			//向用户回复消息
			return $instance->text($content['data']['aa']);
		}

		//判断是否是文本消息
		if ($instance->isTextMsg())
		{
			//获取粉丝发送来的消息内容
			$content = $instance->Content;
			//根据消息内容去关键词表查找数据
			return $this->keyWordToFindResponse($instance,$content);
		}

		//======菜单事件=======//
		//消息管理模块
		$buttonInstance = WeChat::instance('button');
		//点击菜单拉取消息时的事件推送
		if ($buttonInstance->isClickEvent()) {
			//获取消息内容
			$message = $buttonInstance->getMessage();
		    return $this->keyWordToFindResponse($instance,$message->EventKey);
		}

	}

	//根据关键词回复内容
	private function keyWordToFindResponse($instance,$content){
		if($keyword = Keyword::where('key',$content)->first()){
			//通过关键词模型关联 rule
			$rule = $keyword->rule;
			//如果能找到对应的关键词
			if($rule['type'] =='text'){
				//文本消息
				$responseContent = json_decode($rule->responseText->pluck('content')->toArray()[0],true);
				//从所有回复内容中每次随机一个
				$content = array_random($responseContent)['content'];
				//回复粉丝
				return $instance->text($content);
			}elseif ($rule['type'] =='news'){
				//图文消息
				$news = json_decode($rule->responseNews->toArray()[0]['data'],true);
				return $instance->news([$news]);
			}
		}

		//当匹配不到关键词的时候 执行默认回复
		$content = ResponseBase::find(1);
		return $instance->text($content['data']['default']);
	}
}
