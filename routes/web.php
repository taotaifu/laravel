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

Route::get('/', function () {
    return view('welcome');
});

Route::get ('/edu/article/index','Edu\ArticleController@index')->name ('edu.article.index');

Route::get ('/edu/photo/index','Edu\PhotoController@index')->name ('edu.photo.index');

Route::get ('/edu/article/create','Edu\ArticleController@create')->name ('edu.article.create');

Route::get('/edu/article/store','Edu\ArticleController@store')->name ('edu.article.store');

Route::get ('/edu/photo/create','Edu\PhotoController@create')->name ('edu.photo.create');

Route::post('/edu/photo/store','Edu\PhotoController@store')->name ('edu.photo.store');

//Route::resource ('/edu');