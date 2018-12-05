<?php

namespace App\Http\Controllers\Wechat;

use App\Models\ResponseBase;
use App\Models\ResponseNews;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResponseBaseController extends Controller
{



    public function create()
    {

		$field=ResponseBase::find(1);
		return view ('wechat.response_base.create',compact ('field'));
    }


    public function store(Request $request)
    {
		$responseBase = ResponseBase::firstOrNew(['id'=>1]);
		$responseBase['data'] = $request->all();
		$responseBase->save();
		return back()->with('success','操作成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResponseBase  $responseBase
     * @return \Illuminate\Http\Response
     */
    public function show(ResponseBase $responseBase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResponseBase  $responseBase
     * @return \Illuminate\Http\Response
     */
    public function edit(ResponseBase $responseBase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResponseBase  $responseBase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResponseBase $responseBase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResponseBase  $responseBase
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResponseBase $responseBase)
    {
        //
    }
}
