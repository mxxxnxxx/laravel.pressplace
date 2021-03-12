<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['api']], function() {
    Route::post('/place', 'PlaceController@store')->name('place.store');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});
