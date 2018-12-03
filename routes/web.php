<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//首页
Route::get ('/','Home\HomeController@index')->name ('home');

Route::group(['prefix'=>'member','namespace'=>'Member','as'=>'member.'],function(){

	//会员中心
	Route::resource('user','UserController');
	//定义关注/取消关注
	Route::get('attention/{user}','UserController@attention')->name('attention');
	//关注
	Route::get('myFans/{user}','UserController@myFans')->name('myfans');
	//粉丝
	Route::get('myFollowing/{user}','UserController@myFollowing')->name('myfollowing');
	//收藏
	Route::get('myCollect/{user}','UserController@myCollect')->name('mycollect');
	//点赞
	Route::get('myZan/{user}','UserController@myZan')->name('myzan');
	//我的所有通知
	Route::get('notify/{user}','NotifyController@index')->name('notify');
	//标记已读
	Route::get('notify/show/{notify}','NotifyController@show')->name('notify.show');



});

//前台
Route::group(['prefix'=>'home','namespace'=>'Home','as'=>'home.'],function(){
	Route::get('/','HomeController@index')->name('index');
	//文章管理
	Route::resource('article','ArticleController');
	//评论
	Route::resource('comment','CommentController');
	//点赞  取消赞
	Route::get('zan/make','ZanController@make')->name('zan.make');
	//搜索
	Route::get('search','HomeController@search')->name('search');
});



//登录页面
Route::get ('/login','UserController@login')->name ('login');
Route::post('/login','UserController@loginFrom')->name ('login');


//注册页面
Route::get ('/register','UserController@register')->name ('register');
Route::post ('/register','UserController@store')->name ('register');
//注销返回主页
Route::get ('/logout','UserController@logout')->name ('logout');
//密码重置

Route::get ('/password_reset','UserController@passwordReset')->name ('password_reset');
Route::post('/password_reset',	'UserController@passwordResetForm')->name ('password_reset');

//工具路由

//工具类
Route::group(['prefix'=>'util','namespace'=>'Util','as'=>'util.'],function(){
	//发送验证码
	Route::any('/code/send','CodeController@send')->name('code.send');
	//上传
	Route::any('/upload','UploadController@uploader')->name('upload');
	Route::any('/filesLists','UploadController@filesLists')->name('filesLists');
});

//后台群组路由
Route::group(['middleware' => ['admin.auth'],'prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'],function(){
	Route::get('index','IndexController@index')->name('index');
	Route::get('management','IndexController@management')->name('management');
	Route::resource ('category','CategoryController');
	Route::get ('config/edit/{name}','ConfigController@edit')->name ('config.edit');
    Route::post ('config/update/{name}','ConfigController@update')->name ('config.update');

});

//微信管理
Route::group(['prefix'=>'wechat','namespace'=>'Wechat','as'=>'wechat.'],function(){
	//菜单管理
	Route::resource('button','ButtonController');
	Route::get('button/push/{button}','ButtonController@push')->name('button.push');
	//微信通信地址
	Route::get('api/handler','ApiController@handler')->name('api.handler');
});

//轮播图管理
Route::group(['prefix'=>'shower','namespace'=>'Shower','as'=>'shower.'],function(){
	//轮播图管理
	Route::resource('figure','FigureController');

});


