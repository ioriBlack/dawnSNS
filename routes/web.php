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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
//下記追加
Route::get('/createForm','PostsController@createForm');
Route::post('post/create','PostsController@create');
Route::get('posts/{id}/update-form', 'PostsController@updateForm');

Route::post('post/update','PostsController@update');
Route::get('post/{id}/delete','PostsController@delete');

Route::get('/followerList','PostsController@followerList');
Route::get('follows/{id}/follow','PostsController@following');
//Route::post('post/follower','PostsController@follower');
//Route::get('follows/{id}/to_follow','PostsController@follower');

Route::get('/top','PostsController@user');
Route::get('/top','PostsController@index');


Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@userList');
Route::post('/search/following','UsersController@following');
Route::get('/search/user','UsersController@search')->name('search');

Route::get('/followList','PostsController@database');
// Route::get('/search','PostsController@search');
// Route::get('/follow-list','PostsController@index');
// Route::get('/follower-list','PostsController@index');

// Route::get('/followerList','PostsController@index');
// Route::get('do_Follow','PostsController@doFollow');
