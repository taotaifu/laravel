<?php

namespace App\Http\Controllers\Wechat;

use App\Models\ResponseText;
use App\Services\WechatService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ResponseTextController extends Controller
{

    public function index()
    {
		$field=ResponseText::all ();
    	//dd ($field);
       return view ('wechat.response_text.index',compact ('field'));
    }


    public function create(WechatService $wechatService)
    {
    	$ruleView =$wechatService->ruleView ();
    	//dd ($ruleView);
        return view ('wechat.response_text.create',compact ('ruleView'));
    }


    public function store(Request $request,WechatService $wechatService)
    {
        DB::beginTransaction ();
    	$rule=$wechatService->ruleStore('text');
		//dd($request->data);
    	//添加回复内容
		ResponseText::create([
			'content'=>$request['data'],
			'rule_id'=>$rule['id']
		]);
          DB::commit ();
       return redirect ()->route ('wechat.response_text.index')->with ('success','操作成功');
    }


    public function edit(ResponseText $responseText ,WechatService $wechatService)
    {
        $ruleView=$wechatService->ruleView ($responseText['rule_id']);
		//获取回复内容的旧数据
		//dd($responseText);
		return view('wechat.response_text.edit',compact('ruleView','responseText'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wechat  $wechat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ResponseText $responseText,WechatService $wechatService)
    {
		//开启事务
		DB::beginTransaction();
		//dd($responseText);
		//更新规则表和关键词表
		$wechatService->ruleUpdate($responseText['rule_id']);
		//更新回复表
		$responseText->update([
			'content'=>$request['data'],
			'rule_id'=>$responseText['rule_id'],
		]);
		//事务提交
		DB::commit();
		return redirect()->route('wechat.response_text.index')->with('success','操作成功');

	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wechat  $wechat
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResponseText $responseText)
    {
		$responseText->rule()->delete();
		return redirect()->route('wechat.response_text.index')->with('success','操作成功');
    }
}
