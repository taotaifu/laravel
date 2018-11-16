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

//工具
Route::any ('/code/send','Util\CodeController@send')->name ('code.send');
//
//Route::get ('/admin/index','Admin\IndexController@index')->name ('admin.index');

//群组路由
Route::group(['middleware' => ['admin.auth'],'prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'],function(){
	Route::get('index','IndexController@index')->name('index');
});