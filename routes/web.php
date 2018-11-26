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
	Route::get('myFans/{user}','UserController@myFans')->name('myfans');
	Route::get('myFollowing/{user}','UserController@myFollowing')->name('myfollowing');


});



//前台路由组
Route::group(['prefix'=>'home','namespace'=>'Home','as'=>'home.'],function(){
	Route::get('/','HomeController@index')->name('index');
	//文章管理
	Route::resource('article','ArticleController');
	//评论路由
	Route::resource('comment','CommentController');
	Route::get ('zan/make','ZanController@make')->name ('zan.make');
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
	Route::resource ('category','CategoryController');

});



