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
use Whoops\Run;

Route::get('/', function () {
    return view('top');
});
// Route::resource('users', 'UsersController', ['only' => ['index', 'create', 'store']]);

Route::resource('user', 'UserController');
Route::get('user/{user} ', 'UserController@softdelete');

// Route::get('/user/{id}', 'UserController@index')->name('user.index');
// Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit');
// Route::post('user/update/{id}', 'UserController@update')->name('user.update');
// Route::get('/','TopController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
