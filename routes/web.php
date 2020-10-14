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

Route::get('/place','PlaceController@index')->name('place.index');
Route::get('/place/{id}', 'PlaceController@show')->name('place.show');

Route::get('/', function () {
    return redirect('/place');
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
