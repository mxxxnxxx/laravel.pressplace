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

use App\Http\Controllers\UserController;
// use Illuminate\Routing\Route;
use vendor\laravel\framework\src\Illuminate\Routing;
use Whoops\Run;

// place一覧
Route::get('/places','PlaceController@index')->name('place.index');

// 投稿フォーム用
Route::get('/place/new', 'PlaceController@create')->name('place.new');
Route::post('/place', 'PlaceController@store')->name('place.store');
Route::get('/place/edit/{id}', 'PlaceController@edit')->name('place.edit');
Route::post('/place/update/{id}', 'PlaceController@update')->name('place.update');

// place詳細ページ
Route::get('/place/{id}', 'PlaceController@show')->name('place.show');

Route::get('/', function () {
    return redirect('/places');
});

// メール認証していないと操作できないように指定
Route::group(['middleware' => ['auth','verified']], function () {
    // フォームリクエストで$errorが使えるように記述
    Route::group(['middleware' => ['web']], function () {
        Route::resource('user', 'UserController');
        Route::get('user/confirmation/{user} ', 'UserController@softdelete')->name('user.softdelete');
        Route::get('user/delete/{user} ', 'UserController@confirmationSoftdelete')->name('user.confirmationSoftdelete');
    });
});


// Route::get('user/update/{user}', 'UserController@store')
// Route::get('/user/{id}', 'UserController@index')->name('user.index');
// Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit');
// Route::post('user/update/{id}', 'UserController@update')->name('user.update');
// Route::get('/','TopController@index');

// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
