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

Route::get ('/','HomeController@index')->name ('home');


//登录页面
Route::get ('/login','UserController@login')->name ('login');
//注册页面
Route::get ('/register','UserController@register')->name ('register');
Route::post ('/register','UserController@store')->name ('register');

//工具
Route::any ('/code/send','Util\CodeController@send')->name ('code.send');