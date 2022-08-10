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
Route::get('post/{id}/delete','PostsController@index_delete');
Route::get('/myProfile/{id}/delete','PostsController@delete');

Route::get('/{id}/followsProfile','UsersController@followsProfile');
Route::get('/myProfile','UsersController@myProfile_type');

Route::get('/followerList','PostsController@followerList');

Route::get('follows/{id}/follow','PostsController@following_search');
Route::get('follows/{id}/follow','PostsController@following_follows');

Route::get('/followsList','PostsController@followsList');
//Route::post('post/follower','PostsController@follower');
//Route::get('follows/{id}/to_follow','PostsController@follower');

Route::get('/top','PostsController@user');
Route::get('/profile','PostsController@user');
Route::get('/top','PostsController@index');


Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@userList');
// Route::get('/search','FollowsController@followCheck');
Route::post('/search/following','UsersController@following_search');
Route::post('/search/unFollow','UsersController@unFollow_search');
Route::get('/search/user','UsersController@search')->name('search');

Route::get('/profile','UsersController@users');
Route::post('/profile/update','UsersController@profile_user');

Route::get('/followsProfile','UsersController@followsProfile');


Route::get('/logout','UsersController@getLogout');
// Route::get('/logout',[
//   'uses' => 'usersController@getLogout',
//   'as' => 'auth.register'
// ]);
