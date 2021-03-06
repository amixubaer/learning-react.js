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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user', 'ApiController@user');
Route::post('/user/create', 'ApiController@create');
Route::get('/user/edit/{id}', 'ApiController@edit')->name('user.edit');
Route::post('/user/edit/{id}', 'ApiController@editUser');
Route::get('/user/delete/{id}', 'ApiController@delete')->name('user.delete');