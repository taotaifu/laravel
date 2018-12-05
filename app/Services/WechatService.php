<?php

namespace App\Services;

use App\Models\Keyword;
use App\Models\Rule;
use Houdunwang\WeChat\WeChat;

class WechatService{

	public function __construct () {

	$config=config("hd_wechat");
	//dd ($config);
	WeChat::config ($config);
	WeChat::valid();

}

	//加载公共区域的视图文件 包括功能

	public function ruleView($rule_id=0){

		$rule=Rule::find($rule_id);

		$ruleData=[
			//规则名称
			'name'=> $rule?$rule['name']:'',
			//关键词
			'keywords'=>$rule?$rule->keyword()->get()->toArray():[],
		];

		//dd ($ruleDate);
      //加载页面
		return view ('wechat.layouts.rule',compact('ruleData'));
	}

	  //添加数据
	public function ruleStore($type){

      //dd (request ()->all());
		$res=request ()->all ();
		//将post 提交来的 rule 数据转为数组格式
		$rule = json_decode($res['rule'],true);
		//规则表的添加
		\Validator::make($rule,[
			'name'=>'required'
		],[
			'name.required'=>'规则名称不能为空'
		])->validate();
		$ruleModel = Rule::create(['name'=>$rule['name'],'type'=>$type]);

       //关键词表的添加

		foreach ($rule['keywords'] as $value){
			Keyword::create([
				'rule_id'=>$ruleModel['id'],
				'key'=>$value['key']
			]);
		}
		//规则对象返回
		return $ruleModel;
	}

	//编辑数据

	public function ruleUpdate($rule_id){
       //执行规则表的添加
      $rule=Rule::find($rule_id);
      $res=request ()->all ();
      $ruleDate=json_decode($res['rule'],true);
      $rule->update(['name'=>$ruleDate['name']]);

        //关键词编辑
      $rule->Keyword()->delete();

      foreach ($ruleDate['keywords'] as $value){
            Keyword::create([
            	'rule_id'=>$rule_id,
				'key'=>$value['key']
			]);

	  }


	}


}