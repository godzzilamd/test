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

Route::get('/', 'PagesController@index');

Route::get('/user_list', 'PagesController@user_list');

Route::get('/create_user', 'PagesController@create_user');

Route::post('/create_user_end', 'PagesController@create_user_end');

Route::get('/update_user/{id}', 'PagesController@update_user');

Route::post('/update_user_end/{id}', 'PagesController@update_user_end');

Route::get('/delete_user', 'PagesController@delete_user');

Route::get('/delete_user_end/{id}', 'PagesController@delete_user_end');

Route::get('/user_group_list', 'UserGroupController@user_group_list');

Route::get('/create_user_group', 'UserGroupController@create_user_group');

Route::post('/create_user_group_end', 'UserGroupController@create_user_group_end');

Route::get('/update_user_group/{id}', 'UserGroupController@update_user_group');

Route::post('/update_user_group_end/{id}', 'UserGroupController@update_user_group_end');

Route::get('/delete_user_group', 'UserGroupController@delete_user_group');

Route::get('/delete_user_group_end/{id}', 'UserGroupController@delete_user_group_end');

Auth::routes();

Route::redirect('/home', '/');
