<?php

namespace App\Http\Controllers\Wechat;

use App\Models\ResponseNews;
use App\Services\WechatService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
class ResponseNewsController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin.auth',[
			'except'=>[],
		]);
	}

    public function index()
    {
		$field=ResponseNews::all ();
        return view ('wechat.response_news.index',compact ('field'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(WechatService $wechatService)
    {
    	$ruleView=$wechatService->ruleView ();
        return view ('wechat.response_news.create',compact ('ruleView'));
    }


    public function store(Request $request ,WechatService $wechatService)
    {
    	//dd ($request->all ());
		//dd ($request->data);
        //开启事务
		DB::beginTransaction ();
		$rule=$wechatService->ruleStore('news');
		ResponseNews::create([
			'data'=>$request['data'],
			'rule_id'=>$rule['id']
		]);

		//结束事务
		DB::commit ();
       return redirect ()->route ('wechat.response_news.index')->with ('success','操作成功');

    }


    public function edit(ResponseNews $responseNews,WechatService $wechatService)
    {
         $ruleView = $wechatService->ruleView($responseNews['rule_id']);

         return view ('wechat.response_news.edit',compact ('ruleView','responseNews'));
    }


    public function update(Request $request, ResponseNews $responseNews,WechatService $wechatService)
    {
		DB::beginTransaction ();

		$rule=$wechatService->ruleUpdate ('news');

		dd ($rule);

		ResponseNews::update([

			'data'=>$request['data'],
			'rule_id'=>$responseNews['id']
		]);
		//结束事务
		DB::commit ();
		return redirect ()->route ('wechat.response_news.index')->with ('success','操作成功');
    }


    public function destroy(ResponseNews $responseNews)
    {
        $responseNews->delete ();
		return redirect()->route('wechat.response_news.index')->with('success','操作成功');

    }
}
