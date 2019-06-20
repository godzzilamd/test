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

Route::get('/', 'UserController@test');

Route::get('/users', 'UserController@index');

Route::get('users/{user}', 'UserController@show');

Route::middleware('auth:api')->group( function(){

    Route::post('users', 'UserController@store');

    Route::put('users/{user}', 'UserController@update');

    Route::delete('users/{user}', 'UserController@destroy');

});

Route::get('groups', 'GroupsController@index');

Route::get('groups/{group}', 'GroupsController@show');

Route::middleware('auth:api')->group( function(){

    Route::post('groups', 'GroupsController@store');

    Route::put('groups/{group}', 'GroupsController@update');

    Route::delete('groups/{group}', 'GroupsController@destroy');

});

Auth::routes();

Route::redirect('/home', '/');
