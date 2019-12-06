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

Route::get('/', 'GuestController@index');
Route::get('/neh', 'ErrorsController@neh');
Route::get('/logout', 'Auth\LoginController@logout');

Auth::routes();

Route::resource('/user', 'AdminController');
Route::resource('/category', 'CategoryController');
Route::resource('/posts', 'PostController');
//Route::resource('/tag', 'TagController');
Route::post('/tag', 'TagController@addTag');
