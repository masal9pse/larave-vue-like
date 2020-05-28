<?php
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
 error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
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

Auth::routes();

// 全件表示でいいねするためには、ログインさせないといけないから
Route::group(['middleware' => ['auth']], function () {
 Route::get('/', 'PostController@index')->name('posts.index');

 Route::resource('posts', 'PostController')->except('index');
});

// Route::post('/posts/{post}/like', 'LikeController@like');